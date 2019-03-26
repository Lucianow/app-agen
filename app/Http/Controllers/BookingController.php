<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookingController extends Controller
{
    public function index()
    {
        $result = DB::table('wp_latepoint_bookings')->orderBy('id')->get();
        return view('booking')->with(compact('result'));

    }

    public function show($id)
    {
        $result = DB::table('wp_latepoint_bookings')->where('id', $id)->first();
        return view('booking')->with(compact('result'));
    }

    public function store(Request $request)
    {
        DB::table('wp_latepoint_bookings')->insertGetId( [
            "start_date"  => $request->start_date,
            "start_time"  => $request->start_time,
            "end_time"  => $request->end_time,
            "buffer_before"  => $request->buffer_before,
            "buffer_after"  => $request->buffer_after,
            "status"  => $request->status,
            "customer_id"  => $request->customer_id,
            "service_id"  => $request->service_id,
            "agent_id"  => $request->agent_id,
            "ip_address"  => $request->ip_address,
            "created_at"  => $request->created_at,
            "updated_at" => $request->updated_at
        ] );

        $result = DB::table('wp_latepoint_bookings')->orderBy('id')->get();
        return view('booking')->with(compact('result'));
    }

    public function update(Request $request, $id)
    {
        DB::table('wp_latepoint_bookings')->where('id', $id)->update( [
            "start_date"  => $request->start_date,
            "start_time"  => $request->start_time,
            "end_time"  => $request->end_time,
            "buffer_before"  => $request->buffer_before,
            "buffer_after"  => $request->buffer_after,
            "status"  => $request->status,
            "customer_id"  => $request->customer_id,
            "service_id"  => $request->service_id,
            "agent_id"  => $request->agent_id,
            "ip_address"  => $request->ip_address,
            "created_at"  => $request->created_at,
            "updated_at" => $request->updated_at
        ]);

        $result = DB::table('wp_latepoint_bookings')->orderBy('id')->get();
        return view('booking')->with(compact('result'));
    }

    public function delete($id)
    {
        DB::table('wp_latepoint_bookings')->where('id', $id)->delete();

        $result = DB::table('wp_latepoint_bookings')->orderBy('id')->get();
        return view('booking')->with(compact('result'));
    }
}
