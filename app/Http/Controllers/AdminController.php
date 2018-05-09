<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;
use Session;

session_start();

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $admin_id = Session::get('admin_id');

        if ($admin_id != NULL) {
            return Redirect::to('/dashboard')->send();
        }

        return view('admin.admin_login');
    }

    public function admin_login_check(Request $request) {
        //        $admin_email_address = $request->admin_email_address;
        $admin_username = $request->admin_username;
        $admin_password = md5($request->admin_password);

        //        For input test
        //        echo $admin_email_address;
        //        echo '<br/>-------------<br/>';
        //        echo $admin_password;

        $result = DB::table('tbl_ecks_admin')
                ->where('admin_username', $admin_username)
                ->where('admin_password', $admin_password)
                ->first();

        //        For input test
        //        echo '<pre>';
        //        print_r($result);
        //        exit();

        if ($result) {
//            return view('admin.admin_master');

            Session::put('admin_id', $result->admin_id);
            Session::put('admin_name', $result->admin_name);
            Session::put('admin_level', $result->admin_level);

            return Redirect::to('/dashboard');
        } else {
            Session::put('exception', 'User ID or Password Invalid.');
            return Redirect::to('admin-login');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
