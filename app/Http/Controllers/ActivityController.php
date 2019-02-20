<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ActivityController extends Controller
{
    public function index()
    {
        $result = DB::table('wp_latepoint_activities')->orderBy('id')->get();
        return view('activity')->with(compact('result'));
    }

    public function show($id)
    {
        $result = DB::table('wp_latepoint_activities')->where('id', $id)->first();
        return view('activity')->with(compact('result'));
    }

    public function store(Request $request)
    {
        DB::table('wp_latepoint_activities')->insertGetId( [
                "agent_id" => $request->agent_id,
                "booking_id" => $request->booking_id,
                "service_id" => $request->service_id,
                "customer_id" => $request->customer_id,
                "code" => $request->code,
                "description" => $request->description
        ] );
        $result = DB::table('wp_latepoint_activities')->orderBy('id')->get();
        return view('activity')->with(compact('result'));
    }

    public function update(Request $request, $id)
    {

        DB::table('wp_latepoint_activities')->where('id', $id)->update( [
            "agent_id" => $request->agent_id,
            "booking_id" => $request->booking_id,
            "service_id" => $request->service_id,
            "customer_id" => $request->customer_id,
            "code" => $request->code,
            "description" => $request->description
            ]);

        $result = DB::table('wp_latepoint_activities')->orderBy('id')->get();
        return view('activity')->with(compact('result'));

    }

    public function delete($id)
    {
        DB::table('wp_latepoint_activities')->where('id', $id)->delete();

        $result = DB::table('wp_latepoint_activities')->orderBy('id')->get();
        return view('activity')->with(compact('result'));
    }

}
