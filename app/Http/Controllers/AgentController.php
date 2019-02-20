<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AgentController extends Controller
{

    public function index()
    {
        $result = DB::table('wp_latepoint_agents')->orderBy('id')->get();
        return view('agent')->with(compact('result'));
    }

    public function show($id)
    {
        $result = DB::table('wp_latepoint_agents')->where('id', $id)->first();
        return view('agent')->with(compact('result'));
    }

    public function searchName($name)
    {
        $result = DB::select("SELECT * FROM wp_latepoint_agents WHERE UPPER(first_name) LIKE :query ORDER BY first_name",
            ['query' => "%".$name."%"]);
        return view('agent')->with(compact('result'));
    }

    public function searchEmail($email)
    {
        $result = DB::select("SELECT * FROM wp_latepoint_agents WHERE UPPER(email) LIKE :query ORDER BY email",
            ['query' => "%".$email."%"]);
        return view('agent')->with(compact('result'));
    }

    public function store(Request $request)
    {

        DB::table('wp_latepoint_agents')->insertGetId( [
            'avatar_image_id' => $request->avatar_image_id,
            'bio_image_id' => $request->bio_image_id,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'title' => $request->title,
            'bio' => $request->bio,
            'features' => $request->features,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => $request->password,
            'custom_hours' => $request->custom_hours,
            'wp_user_id' => $request->wp_user_id,
            'created_at' => $request->created_at,
            'updated_at'  => $request->updated_at
        ] );
        $result = DB::table('wp_latepoint_agents')->orderBy('id')->get();
        return view('agent')->with(compact('result'));
    }

    public function update(Request $request, $id)
    {

        DB::table('wp_latepoint_agents')->where('id', $id)->update( [
            'avatar_image_id' => $request->avatar_image_id,
            'bio_image_id' => $request->bio_image_id,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'title' => $request->title,
            'bio' => $request->bio,
            'features' => $request->features,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => $request->password,
            'custom_hours' => $request->custom_hours,
            'wp_user_id' => $request->wp_user_id,
            'created_at' => $request->created_at,
            'updated_at'  => $request->updated_at
        ]);

        $result = DB::table('wp_latepoint_agents')->orderBy('id')->get();
        return view('agent')->with(compact('result'));

    }

    public function delete($id)
    {
        DB::table('wp_latepoint_agents')->where('id', $id)->delete();

        $result = DB::table('wp_latepoint_agents')->orderBy('id')->get();
        return view('agent')->with(compact('result'));
    }
}
