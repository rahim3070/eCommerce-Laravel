<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;
use Cart;

class CheckOutController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function checkout() {
        $checkout = view('client.pages.checkout');
        $menu_vertical = view('client.pages.menu_vertical');
        $menu_main = view('client.pages.menu_main');

        return view('client.client_master')
                        ->with('client_content', $checkout)
                        ->with('menu_vertical', $menu_vertical)
                        ->with('menu_main', $menu_main);
    }

    public function ajax_email_check_customer($email_address) {
        $customer_info = DB::table('tbl_ecks_customer')
                ->where('email_address', $email_address)
                ->first();

        if ($customer_info) {
            echo 'Already Exists !!!';
        } else {
            echo 'Available';
        }
    }

    public function save_customer(Request $request) {
        $data = array();
        $data['first_name'] = $request->first_name;
        $data['last_name'] = $request->last_name;
        $data['company_name'] = $request->company_name;
        $data['email_address'] = $request->email_address;
        $data['password'] = md5($request->password);
        $data['address'] = $request->address;
        $data['mobile'] = $request->mobile;
        $data['city'] = $request->city;
        $data['zip_code'] = $request->zip_code;
        $data['country'] = $request->country;

        $customer_id = DB::table('tbl_ecks_customer')->insertGetId($data);
        Session::put('customer_id', $customer_id);
        return Redirect::to('shipping');
    }

    public function shipping() {
        $shipping = view('client.pages.shipping');
        $menu_vertical = view('client.pages.menu_vertical');
        $menu_main = view('client.pages.menu_main');

        return view('client.client_master')
                        ->with('client_content', $shipping)
                        ->with('menu_vertical', $menu_vertical)
                        ->with('menu_main', $menu_main);
    }

    public function ajax_email_check_shipping($email_address) {
        $customer_info = DB::table('tbl_ecks_shipping')
                ->where('email_address', $email_address)
                ->first();

        if ($customer_info) {
            echo 'Already Exists !!!';
        } else {
            echo 'Available';
        }
    }

    public function save_shipping(Request $request) {
        $data = array();
        $data['first_name'] = $request->first_name;
        $data['last_name'] = $request->last_name;
        $data['company_name'] = $request->company_name;
        $data['email_address'] = $request->email_address;
        $data['address'] = $request->address;
        $data['mobile'] = $request->mobile;
        $data['city'] = $request->city;
        $data['zip_code'] = $request->zip_code;
        $data['country'] = $request->country;

        $shipping_id = DB::table('tbl_ecks_shipping')->insertGetId($data);
        Session::put('shipping_id', $shipping_id);
        return Redirect::to('confirm-order');
    }

    public function confirm_order() {
        $confirm_order = view('client.pages.confirm_order');
        $menu_vertical = view('client.pages.menu_vertical');
        $menu_main = view('client.pages.menu_main');

        return view('client.client_master')
                        ->with('client_content', $confirm_order)
                        ->with('menu_vertical', $menu_vertical)
                        ->with('menu_main', $menu_main);
    }

    public function place_order(Request $request) {
        $payment_type = $request->payment_type;
        $data['payment_type'] = $payment_type;
        $payment_id = DB::table('tbl_ecks_payment')->insertGetId($data);

        // Start Order Save
        $odata = array();
        $odata['customer_id'] = Session::get('customer_id');
        $odata['shipping_id'] = Session::get('shipping_id');
        $odata['payment_id'] = $payment_id;
        $order_total = str_replace(",","",Cart::total());
        $odata['order_total'] = $order_total;
        $order_id = DB::table('tbl_ecks_order')->insertGetId($odata);
        // End Order Save
        
        // Start Order Details Save
        $oddata = array();
        $contents = Cart::content();
        
        foreach($contents as $v_contents){
          $oddata['order_id'] = $order_id;
          $oddata['product_id'] = $v_contents->id;
          $oddata['product_name'] = $v_contents->name;
          $oddata['product_price'] = $v_contents->price;
          $oddata['product_sales_qty'] = $v_contents->qty;
          
          DB::table('tbl_ecks_order_details')->insert($oddata);
        }        
        // End Order Details Save

        if ($payment_type == 'paypal') {
            return view('client.pages.htmlWesiteStandardPayment');
        }

        if ($payment_type == 'cash_on_delivery') {
            Cart::destroy();
            return Redirect::to('successfull-order');
        }
    }
    
    public function successfull_order(){
        $successfull_order = view('client.pages.successfull_order');
        $menu_vertical = view('client.pages.menu_vertical');
        $menu_main = view('client.pages.menu_main');

        return view('client.client_master')
                        ->with('client_content', $successfull_order)
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
