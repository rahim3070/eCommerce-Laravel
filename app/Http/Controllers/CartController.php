<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Cart;
use DB;

class CartController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add_to_cart($product_id, Request $request) {
        if ($request->qty == NULL) {
            $qty = 1;
        } else {
            $qty = $request->qty;
        }
        //$product_id = $request->product_id;

        $product_info = DB::table('tbl_ecks_product')
                ->join('tbl_ecks_product_image', 'tbl_ecks_product.product_id', '=', 'tbl_ecks_product_image.product_id')
                //->where('tbl_ecks_product.is_featured', 1)
                ->where('tbl_ecks_product.publication_status', 1)
                ->where('tbl_ecks_product.deletion_status', 0)
                ->where('tbl_ecks_product_image.image_level', 1)
                ->where('tbl_ecks_product.product_id', $product_id)
                ->select('tbl_ecks_product.*', 'tbl_ecks_product_image.image_option')
                ->first();

        Cart::add(['id' => $product_info->product_id, 'name' => $product_info->product_name, 'qty' => $qty, 'price' => $product_info->new_price, 'options' => ['image' => $product_info->image_option]]);

        return Redirect::to('order');
    }

    public function update_cart(Request $request) {
        $row_id = $request->row_id;
        $qty = $request->qty;

        Cart::update($row_id, $qty);

        return Redirect::to('order');
    }

    public function delete_from_cart($rowId) {
        Cart::remove($rowId);
        return Redirect::to('order');
    }

    public function order() {
        $order = view('client.pages.order');

        $menu_vertical = view('client.pages.menu_vertical');
        $menu_main = view('client.pages.menu_main');

        return view('client.client_master')
                        ->with('client_content', $order)
                        ->with('menu_vertical', $menu_vertical)
                        ->with('menu_main', $menu_main);
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
