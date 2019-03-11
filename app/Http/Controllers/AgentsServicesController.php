<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AgentsServicesController extends Controller
{
    public function index()
    {
        $result = DB::table('wp_latepoint_agents_services')->orderBy('id')->get();
        return view('agentsServices')->with(compact('result'));
    }

//    retornará todos os agentes e seus respectivos serviços associados
    public function show($id)
    {
        $result = DB::table('wp_latepoint_agents_services')->where('agent_id', $id)->get();
        return view('agentsServices')->with(compact('result'));
    }


    public function store(Request $request)
    {

        DB::table('wp_latepoint_agents_services')->insertGetId([
            'agent_id' => $request->agent_id,
            'service_id' => $request->service_id,
            'is_custom_hours' => $request->is_custom_hours,
            'is_custom_price' => $request->is_custom_price,
            'is_custom_duration' => $request->is_custom_duration,
            'created_at' => $request->created_at,
            'updated_at' => $request->updated_at
        ]);
        $result = DB::table('wp_latepoint_agents_services')->orderBy('id')->get();
        return view('agentsServices')->with(compact('result'));
    }

    public function update(Request $request, $id)
    {
        DB::table('wp_latepoint_agents_services')->where('id', $id)->update( [
            'agent_id' => $request->agent_id,
            'service_id' => $request->service_id,
            'is_custom_hours' => $request->is_custom_hours,
            'is_custom_price' => $request->is_custom_price,
            'is_custom_duration' => $request->is_custom_duration,
            'created_at' => $request->created_at,
            'updated_at' => $request->updated_at
        ]);

        $result = DB::table('wp_latepoint_agents_services')->orderBy('id')->get();
        return view('agentsServices')->with(compact('result'));
    }

    public function delete($id)
    {
        DB::table('wp_latepoint_agents_services')->where('id', $id)->delete();

        $result = DB::table('wp_latepoint_agents_services')->orderBy('id')->get();
        return view('agentsServices')->with(compact('result'));
    }



}
