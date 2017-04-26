<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Drone;
use App\Vol;

class VolsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($nickname, $droneid)
    {
        $vols = Drone::find($droneid)->vols;

        if (!$vols)
        {
            return response()->json(['errors'=>array(['code'=>404,'message'=>'Drone Not Found'])],404);
        }else{
           //OK
            return response()->json(['status'=>'ok','data'=>$vols],200);
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
        $newVol = Vol::create($request->all());
        return response()->json(['status'=>'ok'],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($nickname, $droneid, $volid)
    {
        $vol = Vol::find($volid);
        if (!$vol)
        {
            return response()->json(['errors'=>array(['code'=>404,'message'=>'Vol Not Found'])],404);
        }else{
           //OK
            return response()->json(['status'=>'ok','data'=>$vol],200);
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
        $vol = Vol::find($id);
        if (!$vol)
        {
            return response()->json(['errors'=>array(['code'=>404,'message'=>'Vol Not Found'])],404);
        }else{
            $vol->delete();
           //OK
            return response()->json(['status'=>'ok'],200);
        }
    }
}
