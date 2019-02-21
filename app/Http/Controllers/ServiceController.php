<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServiceController extends Controller
{
    public function index()
    {
        $result = DB::table('wp_latepoint_services')->orderBy('id')->get();
        return view('service')->with(compact('result'));
    }

    public function show($id)
    {
        $result = DB::table('wp_latepoint_services')->where('id', $id)->first();
        return view('service')->with(compact('result'));
    }

    public function searchName($name)
    {
        $result = DB::select("SELECT * FROM wp_latepoint_services WHERE UPPER(name) LIKE :query ORDER BY name",
            ['query' => "%".$name."%"]);
        return view('service')->with(compact('result'));
    }

    public function store(Request $request)
    {
        DB::table('wp_latepoint_services')->insertGetId( [
            "name" => $request->name  ,
            "short_description" => $request->short_description  ,
            "is_price_variable" => $request->is_price_variable  ,
            "price_min" => $request->price_min  ,
            "price_max" => $request->price_max  ,
            "charge_amount" => $request->charge_amount  ,
            "is_deposit_required" => $request->is_deposit_required  ,
            "deposit_value" => $request->deposit_value  ,
            "duration" => $request->duration  ,
            "buffer_before" => $request->buffer_before  ,
            "buffer_after" => $request->buffer_after  ,
            "category_id" => $request->category_id  ,
            "order_number" => $request->order_number  ,
            "selection_image_id" => $request->selection_image_id  ,
            "description_image_id" => $request->description_image_id  ,
            "bg_color" => $request->bg_color  ,
            "status" => $request->status  ,
            "created_at" => $request->created_at  ,
            "updated_at" => $request->updated_at
        ] );

        $result = DB::table('wp_latepoint_services')->orderBy('id')->get();
        return view('service')->with(compact('result'));
    }

    public function update(Request $request, $id)
    {
        DB::table('wp_latepoint_services')->where('id', $id)->update( [
            "name" => $request->name  ,
            "short_description" => $request->short_description  ,
            "is_price_variable" => $request->is_price_variable  ,
            "price_min" => $request->price_min  ,
            "price_max" => $request->price_max  ,
            "charge_amount" => $request->charge_amount  ,
            "is_deposit_required" => $request->is_deposit_required  ,
            "deposit_value" => $request->deposit_value  ,
            "duration" => $request->duration  ,
            "buffer_before" => $request->buffer_before  ,
            "buffer_after" => $request->buffer_after  ,
            "category_id" => $request->category_id  ,
            "order_number" => $request->order_number  ,
            "selection_image_id" => $request->selection_image_id  ,
            "description_image_id" => $request->description_image_id  ,
            "bg_color" => $request->bg_color  ,
            "status" => $request->status  ,
            "created_at" => $request->created_at  ,
            "updated_at" => $request->updated_at
        ]);
        $result = DB::table('wp_latepoint_services')->orderBy('id')->get();
        return view('service')->with(compact('result'));
    }

    public function delete($id)
    {
        DB::table('wp_latepoint_services')->where('id', $id)->delete();

        $result = DB::table('wp_latepoint_services')->orderBy('id')->get();
        return view('service')->with(compact('result'));
    }
}
