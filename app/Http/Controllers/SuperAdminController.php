<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use DB;
use Illuminate\Support\Facades\Redirect;

session_start();

class SuperAdminController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $admin_id = Session::get('admin_id');

        if ($admin_id == NULL) {
            return Redirect::to('admin-login')->send();
        }
        $dashboard_content = view('admin.pages.dashboard_content');
        return view('admin.admin_master')
                        ->with('admin_content', $dashboard_content);
    }

    public function add_category() {
        $category_info = DB::table('tbl_ecks_category')
                ->where('publication_status', 1)
                ->where('deletion_status', 0)
                ->get();

        $add_category = view('admin.pages.add_category')
                ->with('category_info', $category_info);
        return view('admin.admin_master')
                        ->with('admin_content', $add_category);
    }

    public function save_category(Request $request) {
        $data = array();
        $data['category_name'] = $request->category_name;
        $data['category_description'] = $request->category_description;
        $data['parent_id'] = $request->parent_id;
        $data['publication_status'] = $request->publication_status;
        //$data['deletion_status'] = $request->"0";

        if ($request->is_featured == 'on') {
            $data['is_featured'] = 1;
        }

        $image = $request->file('category_image');

        if ($image) {
            $image_name = str_random(20);
            $ext = strtolower($image->getClientOriginalExtension());

            ////For Image validation / Not work
            //if ($ext != 'jpg' && $ext != 'jpeg' && $ext != 'png' && $ext != 'gif') {
            //    Session::put('message', 'Please select jpg,jpeg,png,gif type file.');
            //    exit();
            //} else {
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'images/category_image/';
            $image_url = $upload_path . $image_full_name;
            $success = $image->move($upload_path, $image_full_name);
            //}

            if ($success) {
                $data['category_image'] = $image_url;

                DB::table('tbl_ecks_category')->insert($data);
                Session::put('message', 'Save Successfully.');
                return Redirect::to('add-category');
            }
        } else {
            DB::table('tbl_ecks_category')->insert($data);
            Session::put('message', 'Save Successfully.');
            return Redirect::to('add-category');
        }
    }

    public function manage_category() {
        $all_category_info = DB::table('tbl_ecks_category')->get();

        $manage_category = view('admin.pages.manage_category')
                ->with('all_category_info', $all_category_info);

        return view('admin.admin_master')
                        ->with('admin_content', $manage_category);
    }

    public function unpublished_category($category_id) {
        DB::table('tbl_ecks_category')
                ->where('category_id', $category_id)
                ->update(['publication_status' => 0]);

        return Redirect::to('/manage-category');
    }

    public function published_category($category_id) {
        DB::table('tbl_ecks_category')
                ->where('category_id', $category_id)
                ->update(['publication_status' => 1]);

        return Redirect::to('/manage-category');
    }

    public function edit_category($category_id) {
        // For Dropdownlist Load
        $all_category_info = DB::table('tbl_ecks_category')
                ->where('publication_status', 1)
                ->where('deletion_status', 0)
                ->get();

        // For Edit Form Load
        $category_info = DB::table('tbl_ecks_category')
                ->where('category_id', $category_id)
                ->first();

        $edit_category = view('admin.pages.edit_category')
                ->with('all_category_info', $all_category_info)
                ->with('category_info', $category_info);

        return view('admin.admin_master')
                        ->with('admin_content', $edit_category);
    }

    public function update_category(Request $request) {
        $data = array();
        $category_id = $request->category_id;
        $data['category_name'] = $request->category_name;
        $data['category_description'] = $request->category_description;
        $data['parent_id'] = $request->parent_id;
        $data['publication_status'] = $request->publication_status;
        //$data['deletion_status'] = $request->"0";

        $image = $request->file('category_image');

        if ($image) {
            $image_name = str_random(20);
            $ext = strtolower($image->getClientOriginalExtension());

            ////For Image validation / Not work
            //if ($ext != 'jpg' && $ext != 'jpeg' && $ext != 'png' && $ext != 'gif') {
            //    Session::put('message', 'Please select jpg,jpeg,png,gif type file.');
            //    exit();
            //} else {
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'images/category_image/';
            $image_url = $upload_path . $image_full_name;
            $success = $image->move($upload_path, $image_full_name);
            //}

            if ($success) {
                $data['category_image'] = $image_url;

                DB::table('tbl_ecks_category')
                        ->where('category_id', $category_id)
                        ->update($data);

                Session::put('message', 'Updated Successfully.');
                return Redirect::to('/edit-category/' . $category_id);
            }
        } else {
            DB::table('tbl_ecks_category')
                    ->where('category_id', $category_id)
                    ->update($data);

            Session::put('message', 'Updated Successfully.');
            return Redirect::to('/edit-category/' . $category_id);
        }
    }

    public function undo_category($category_id) {
        DB::table('tbl_ecks_category')
                ->where('category_id', $category_id)
                ->update(['deletion_status' => 0]);

        return Redirect::to('/manage-category');
    }

    public function delete_category($category_id) {
//        DB::table('tbl_ecks_category')
//                ->where('category_id', $category_id)
//                ->delete();

        DB::table('tbl_ecks_category')
                ->where('category_id', $category_id)
                ->update(['deletion_status' => 1]);

        return Redirect::to('/manage-category');
    }
    
    public function remove_featured_category($category_id) {
        DB::table('tbl_ecks_category')
                ->where('category_id', $category_id)
                ->where('parent_id', 0)
                ->update(['is_featured' => 0]);

        return Redirect::to('/manage-category');
    }
    
    public function add_featured_category($category_id) {
        DB::table('tbl_ecks_category')
                ->where('category_id', $category_id)
                ->where('parent_id', 0)
                ->update(['is_featured' => 1]);

        return Redirect::to('/manage-category');
    }

    public function add_manufacturer() {
        $add_category = view('admin.pages.add_manufacturer');
        return view('admin.admin_master')
                        ->with('admin_content', $add_category);
    }

    public function save_manufacturer(Request $request) {
        $data = array();
        $data['manufacturer_name'] = $request->manufacturer_name;
        $data['manufacturer_description'] = $request->manufacturer_description;
        $data['publication_status'] = $request->publication_status;

        DB::table('tbl_ecks_manufacturer')->insert($data);
        Session::put('message', 'Save Successfully.');
        return Redirect::to('add-manufacturer');
    }

    public function manage_manufacturer() {
        $all_manufacturer_info = DB::table('tbl_ecks_manufacturer')->get();

        $manage_manufacturer = view('admin.pages.manage_manufacturer')
                ->with('all_manufacturer_info', $all_manufacturer_info);

        return view('admin.admin_master')
                        ->with('admin_content', $manage_manufacturer);
    }

    public function unpublished_manufacturer($manufacturer_id) {
        DB::table('tbl_ecks_manufacturer')
                ->where('manufacturer_id', $manufacturer_id)
                ->update(['publication_status' => 0]);

        return Redirect::to('/manage-manufacturer');
    }

    public function published_manufacturer($manufacturer_id) {
        DB::table('tbl_ecks_manufacturer')
                ->where('manufacturer_id', $manufacturer_id)
                ->update(['publication_status' => 1]);

        return Redirect::to('/manage-manufacturer');
    }

    public function undo_manufacturer($manufacturer_id) {
        DB::table('tbl_ecks_manufacturer')
                ->where('manufacturer_id', $manufacturer_id)
                ->update(['deletion_status' => 0]);

        return Redirect::to('/manage-manufacturer');
    }

    public function delete_manufacturer($manufacturer_id) {
//        DB::table('tbl_ecks_manufacturer')
//                ->where('manufacturer_id', $manufacturer_id)
//                ->delete();

        DB::table('tbl_ecks_manufacturer')
                ->where('manufacturer_id', $manufacturer_id)
                ->update(['deletion_status' => 1]);

        return Redirect::to('/manage-manufacturer');
    }

    public function add_product() {
        $category_info = DB::table('tbl_ecks_category')
                ->where('publication_status', 1)
                ->where('deletion_status', 0)
                ->get();

        $manufacturer_info = DB::table('tbl_ecks_manufacturer')
                ->where('publication_status', 1)
                ->where('deletion_status', 0)
                ->get();

        $add_product = view('admin.pages.add_product')
                ->with('category_info', $category_info)
                ->with('manufacturer_info', $manufacturer_info);


//        echo'<pre>';
//        print_r($category_info);
//        exit();

        return view('admin.admin_master')
                        ->with('admin_content', $add_product);
    }

    public function save_product_info(Request $request) {
        $data = array();
        $data['product_name'] = $request->product_name;
        $data['short_description'] = $request->short_description;
        $data['long_description'] = $request->long_description;
        $data['new_price'] = $request->new_price;
        $data['old_price'] = $request->old_price;
        $data['publication_status'] = $request->publication_status;

        if ($request->is_featured == 'on') {
            $data['is_featured'] = 1;
        }

        $data['stock'] = $request->stock;
        $data['category_id'] = $request->category_id;
        $data['manufacturer_id'] = $request->manufacturer_id;

        $product_id = DB::table('tbl_ecks_product')->insertGetId($data);
        Session::put('message', 'Save Successfully.');
        $this->do_upload($request, $product_id);
        return Redirect::to('add-product');
    }

    public function do_upload($request, $product_id) {
        for ($i = 1; $i <= 4; $i++) {
            $image = $request->file("p_image$i");

            if ($image) {
                $image_name = str_random(20);
                $ext = strtolower($image->getClientOriginalExtension());
                $image_full_name = $image_name . '.' . $ext;
                $upload_path = 'images/product_image/';
                $image_url = $upload_path . $image_full_name;
                $success = $image->move($upload_path, $image_full_name);

                if ($success) {
                    $idata = array();
                    $idata['product_id'] = $product_id;
                    $idata['image_option'] = $image_url;

                    if ($i === 1) {
                        $idata['image_level'] = 1;
                    } else {
                        $idata['image_level'] = 0;
                    }

                    DB::table('tbl_ecks_product_image')->insert($idata);
                }
            }
        }

        return;
    }

//    public function do_upload($request, $product_id) {
//        $picture = '';
//        $i = 1;
//        if ($request->hasFile('p_image')) {
//            $file = $request->file('p_image');
//
//            foreach ($files as $file) {
//                $filename = $file->getClientOriginalName();
//                //$extension = $file->getClientOriginalExtension();
//                $picture = date('His') . $filename;
//
//                $upload_path = 'images/product_image/';
//                $image_url = $upload_path . $picture;
//
//                $destinationPath = base_path() . 'images\product_image';
//                $success = $file->move($destinationPath, $picture);
//
//                if ($success) {
//                    $idata = array();
//                    $idata['product_id'] = $product_id;
//                    $idata['image_option'] = $image_url;
//
//                    if ($i === 1) {
//                        $idata['image_level'] = 1;
//                    } else {
//                        $idata['image_level'] = 0;
//                    }
//
//                    DB::table('tbl_ecks_product_image')->insert($idata);
//                } else {
//                    echo "Upload Error";
//                }
//
//                $i++;
//            }
//        }
//        return;
//    }

    public function manage_product() {
        $all_product_info = DB::table('tbl_ecks_product')->get();

        $manage_product = view('admin.pages.manage_product')
                ->with('all_product_info', $all_product_info);

        return view('admin.admin_master')
                        ->with('admin_content', $manage_product);
    }

    public function unpublished_product($product_id) {
        DB::table('tbl_ecks_product')
                ->where('product_id', $product_id)
                ->update(['publication_status' => 0]);

        return Redirect::to('/manage-product');
    }

    public function published_product($product_id) {
        DB::table('tbl_ecks_product')
                ->where('product_id', $product_id)
                ->update(['publication_status' => 1]);

        return Redirect::to('/manage-product');
    }

    public function undo_product($product_id) {
        DB::table('tbl_ecks_product')
                ->where('product_id', $product_id)
                ->update(['deletion_status' => 0]);

        return Redirect::to('/manage-product');
    }

    public function delete_product($product_id) {
        DB::table('tbl_ecks_product')
                ->where('product_id', $product_id)
                ->update(['deletion_status' => 1]);

        return Redirect::to('/manage-product');
    }

    public function remove_featured_product($product_id) {
        DB::table('tbl_ecks_product')
                ->where('product_id', $product_id)
                ->update(['is_featured' => 0]);

        return Redirect::to('/manage-product');
    }
    
    public function add_featured_product($product_id) {
        DB::table('tbl_ecks_product')
                ->where('product_id', $product_id)
                ->update(['is_featured' => 1]);

        return Redirect::to('/manage-product');
    }
    
    public function logout() {
        Session::put('admin_name', null);
        Session::put('admin_id', null);
        Session::put('message', 'You are Successfully Logout.');

        return Redirect::to('admin-login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }

}
