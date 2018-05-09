<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ClientController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $client_content = view('client.pages.home');
        $menu_vertical = view('client.pages.menu_vertical');
        $menu_main = view('client.pages.menu_main');

        return view('client.client_master')
                        ->with('client_content', $client_content)
                        ->with('menu_vertical', $menu_vertical)
                        ->with('menu_main', $menu_main);
    }

    public function client_login() {
        $client_login = view('client.pages.client_login');
        return view('client.client_master')
                        ->with('client_content', $client_login);
    }

//    public function order() {
//        $client_order = view('client.pages.order');
//        return view('client.client_master')
//                        ->with('client_content', $client_order);
//    }

    public function wishlist() {
        $wishlist = view('client.pages.wishlist');
        $menu_vertical = view('client.pages.menu_vertical');
        $menu_main = view('client.pages.menu_main');

        return view('client.client_master')
                        ->with('client_content', $wishlist)
                        ->with('menu_vertical', $menu_vertical)
                        ->with('menu_main', $menu_main);
    }

    public function compare() {
        $compare = view('client.pages.compare');
        $menu_vertical = view('client.pages.menu_vertical');
        $menu_main = view('client.pages.menu_main');

        return view('client.client_master')
                        ->with('client_content', $compare)
                        ->with('menu_vertical', $menu_vertical)
                        ->with('menu_main', $menu_main);
    }    

    public function category($id) {
        $category_info = DB::table('tbl_ecks_product')
                ->join('tbl_ecks_product_image', 'tbl_ecks_product.product_id', '=', 'tbl_ecks_product_image.product_id')
                ->join('tbl_ecks_category', 'tbl_ecks_product.category_id', '=', 'tbl_ecks_category.category_id')
                //->where('tbl_ecks_product.is_featured', 1)
                ->where('tbl_ecks_product.publication_status', 1)
                ->where('tbl_ecks_product.deletion_status', 0)
                ->where('tbl_ecks_product_image.image_level', 1)
                ->where('tbl_ecks_category.category_id', $id)
                ->select('tbl_ecks_product.*', 'tbl_ecks_product_image.image_option', 'tbl_ecks_category.category_name')
                ->get();

        $category = view('client.pages.category')
                ->with('category_info', $category_info);

        $menu_vertical = view('client.pages.menu_vertical');
        $menu_main = view('client.pages.menu_main');

        return view('client.client_master')
                        ->with('client_content', $category)
                        ->with('home_menu_vertical', $menu_vertical)
                        ->with('home_menu_main', $menu_main);
    }

    public function product_details($id) {
        $category_info = DB::table('tbl_ecks_product')
                ->join('tbl_ecks_product_image', 'tbl_ecks_product.product_id', '=', 'tbl_ecks_product_image.product_id')
                ->join('tbl_ecks_category', 'tbl_ecks_product.category_id', '=', 'tbl_ecks_category.category_id')
                //->where('tbl_ecks_product.is_featured', 1)
                ->where('tbl_ecks_product.publication_status', 1)
                ->where('tbl_ecks_product.deletion_status', 0)
                ->where('tbl_ecks_product_image.image_level', 1)
                ->where('tbl_ecks_product.product_id', $id)
                ->select('tbl_ecks_product.*', 'tbl_ecks_product_image.image_option', 'tbl_ecks_product_image.image_level', 'tbl_ecks_category.category_name')
                ->get();

        $product_details = view('client.pages.product_details')
                ->with('category_info', $category_info);

        $menu_vertical = view('client.pages.menu_vertical');
        $menu_main = view('client.pages.menu_main');

        return view('client.client_master')
                        ->with('client_content', $product_details)
                        ->with('home_menu_vertical', $menu_vertical)
                        ->with('home_menu_main', $menu_main);
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
