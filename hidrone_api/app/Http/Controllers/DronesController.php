<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Usuari;
use App\Drone;

class DronesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($nickname)
    {
        $usuari = Usuari::whereRaw('Nick = ? ', [$nickname])->get()->first();
        if (!$usuari)
        {
            return response()->json(['errors'=>array(['code'=>404,'message'=>'Usuari Not Found'])],404);
        }else{
            $drones = Usuari::find($usuari->id)->drones;
           //OK
            return response()->json(['status'=>'ok','data'=>$drones],200);
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
        $newdrone = Drone::create($request->all());
        //OK
        return response()->json(['status'=>'ok'],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($nickname, $id_drone)
    {
        $drone = Drone::find($id_drone);
        if (!$drone)
        {
            return response()->json(['errors'=>array(['code'=>404,'message'=>'Drone Not Found'])],404);
        }else{
           //OK
            return response()->json(['status'=>'ok','data'=>$drone],200);
        }
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
    public function update(Request $request, $nickname ,$id)
    {
        $drone = Drone::find($id);
        if (!$drone)
        {
            return response()->json(['errors'=>array(['code'=>404,'message'=>'Drone Not Found'])],404);
        }else{
             $drone->update($request->all());
           //OK
            return response()->json(['status'=>'ok'],200);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $drone = Drone::find($id);
        if (!$drone)
        {
            return response()->json(['errors'=>array(['code'=>404,'message'=>'Drone Not Found'])],404);
        }else{
            $drone->delete();
           //OK
            return response()->json(['status'=>'ok'],200);
        }
    }
}
