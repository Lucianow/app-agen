<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    public function index()
    {
        $result = DB::table('wp_latepoint_customers')->orderBy('id')->get();
        return view('customer')->with(compact('result'));
    }

    public function show($id)
    {
        $result = DB::table('wp_latepoint_customers')->where('id', $id)->first();
        return view('customer')->with(compact('result'));
    }

    public function searchName($name)
    {
        $result = DB::select("SELECT * FROM wp_latepoint_customers WHERE UPPER(first_name) LIKE :query ORDER BY first_name",
            ['query' => "%".$name."%"]);
        return view('customer')->with(compact('result'));
    }

    public function searchEmail($email)
    {
        $result = DB::select("SELECT * FROM wp_latepoint_customers WHERE UPPER(email) LIKE :query ORDER BY email",
            ['query' => "%".$email."%"]);
        return view('customer')->with(compact('result'));
    }

    public function store(Request $request)
    {
        DB::table('wp_latepoint_customers')->insertGetId( [
            "first_name" => $request->first_name  ,
            "last_name" => $request->last_name  ,
            "email" => $request->email  ,
            "phone" => $request->phone  ,
            "avatar_image_id" => $request->avatar_image_id  ,
            "status" => $request->status  ,
            "password" => $request->password  ,
            "activation_key" => $request->activation_key  ,
            "account_nonse" => $request->account_nonse  ,
            "google_user_id" => $request->google_user_id  ,
            "facebook_user_id" => $request->facebook_user_id  ,
            "is_guest" => $request->is_guest  ,
            "notes" => $request->notes  ,
            "created_at" => $request->created_at  ,
            "updated_at" => $request->updated_at
        ] );

        $result = DB::table('wp_latepoint_customers')->orderBy('id')->get();
        return view('customer')->with(compact('result'));
    }

    public function update(Request $request, $id)
    {
        DB::table('wp_latepoint_customers')->where('id', $id)->update( [
            "first_name" => $request->first_name  ,
            "last_name" => $request->last_name  ,
            "email" => $request->email  ,
            "phone" => $request->phone  ,
            "avatar_image_id" => $request->avatar_image_id  ,
            "status" => $request->status  ,
            "password" => $request->password  ,
            "activation_key" => $request->activation_key  ,
            "account_nonse" => $request->account_nonse  ,
            "google_user_id" => $request->google_user_id  ,
            "facebook_user_id" => $request->facebook_user_id  ,
            "is_guest" => $request->is_guest  ,
            "notes" => $request->notes  ,
            "created_at" => $request->created_at  ,
            "updated_at" => $request->updated_at
        ]);

        $result = DB::table('wp_latepoint_customers')->orderBy('id')->get();
        return view('customer')->with(compact('result'));
    }

    public function delete($id)
    {
        DB::table('wp_latepoint_customers')->where('id', $id)->delete();

        $result = DB::table('wp_latepoint_customers')->orderBy('id')->get();
        return view('customer')->with(compact('result'));
    }

}
