<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LocationController extends Controller
{

    public function index()
    {
        $result = DB::table('wp_latepoint_locations')->orderBy('id')->get();
        return view('location')->with(compact('result'));
    }

    public function show($id)
    {
        $result = DB::table('wp_latepoint_locations')->where('id', $id)->first();
        return view('location')->with(compact('result'));
    }

    public function searchName($name)
    {
        $result = DB::select("SELECT * FROM wp_latepoint_locations WHERE UPPER(name) LIKE :query ORDER BY name",
            ['query' => "%".$name."%"]);
        return view('location')->with(compact('result'));
    }

    public function searchAddress($address)
    {
        $result = DB::select("SELECT * FROM wp_latepoint_locations WHERE UPPER(full_address) LIKE :query ORDER BY id",
            ['query' => "%".$address."%"]);
        return view('location')->with(compact('result'));
    }

    public function store(Request $request)
    {

        DB::table('wp_latepoint_locations')->insertGetId( [
            'name' => $request->name,
            'full_address' => $request->full_address,
            'status' => $request->status,
            'selection_image_id' => $request->selection_image_id,
            'created_at' => $request->created_at,
            'updated_at'  => $request->updated_at
        ] );
        $result = DB::table('wp_latepoint_locations')->orderBy('id')->get();
        return view('location')->with(compact('result'));
    }


    public function update(Request $request, $id)
    {
        DB::table('wp_latepoint_locations')->where('id', $id)->update( [
            'name' => $request->name,
            'full_address' => $request->full_address,
            'status' => $request->status,
            'selection_image_id' => $request->selection_image_id,
            'created_at' => $request->created_at,
            'updated_at'  => $request->updated_at
        ]);

        $result = DB::table('wp_latepoint_locations')->orderBy('id')->get();
        return view('location')->with(compact('result'));
    }


    public function delete($id)
    {
        DB::table('wp_latepoint_locations')->where('id', $id)->delete();

        $result = DB::table('wp_latepoint_locations')->orderBy('id')->get();
        return view('location')->with(compact('result'));
    }


}
