<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ServiceCategory;
use Illuminate\Support\Facades\DB;

class ServiceCategoryController extends Controller
{


    public function index()
    {
        $result = DB::table('wp_latepoint_service_categories')->orderBy('id')->get();
        return view('serviceCategory')->with(compact('result'));
    }

    public function show($id)
    {
        $result = DB::table('ServiceCategoryController.php')->where('id', $id)->first();
        return view('serviceCategory')->with(compact('result'));
    }

    public function searchName($name)
    {
        $result = DB::select("SELECT * FROM wp_latepoint_service_categories WHERE UPPER(name) LIKE :query ORDER BY name",
            ['query' => "%".$name."%"]);
        return view('serviceCategory')->with(compact('result'));
    }

    public function store(Request $request)
    {
        DB::table('wp_latepoint_services')->insertGetId( [
            "name" => $request->name  ,
            "short_description" => $request->short_description  ,
            "parent_id" => $request->parent_id  ,
            "section_image_id" => $request->section_image_id  ,
            "order_number" => $request->order_number  ,
            "created_at" => $request->created_at  ,
            "updated_at" => $request->updated_at
        ] );
        $result = DB::table('wp_latepoint_service_categories')->orderBy('id')->get();
        return view('servicecategory')->with(compact('result'));

    }

    public function update(Request $request, $id)
    {
        DB::table('wp_latepoint_customers')->where('id', $id)->update( [
            "name" => $request->name  ,
            "short_description" => $request->short_description  ,
            "parent_id" => $request->parent_id  ,
            "section_image_id" => $request->section_image_id  ,
            "order_number" => $request->order_number  ,
            "created_at" => $request->created_at  ,
            "updated_at" => $request->updated_at
        ]);

        $result = DB::table('wp_latepoint_service_categories')->orderBy('id')->get();
        return view('servicecategory')->with(compact('result'));
    }

    public function delete($id)
    {
        DB::table('wp_latepoint_service_categories')->where('id', $id)->delete();

        $result = DB::table('wp_latepoint_service_categories')->orderBy('id')->get();
        return view('servicecategory')->with(compact('result'));
    }
}
