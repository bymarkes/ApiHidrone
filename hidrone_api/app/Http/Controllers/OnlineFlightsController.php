<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\OnlineFlight;

class OnlineFlightsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $onlineflights = OnlineFlight::all();
       
       //OK
       return response()->json(['status'=>'ok','data'=>$onlineflights],200);
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
        $newOnlineFlight = OnlineFlight::create($request->all());
        
        //OK
        return response()->json(['status'=>'ok'],200); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $onlineflight = OnlineFlight::find($id);

        if (!$onlineflight)
        {
            return response()->json(['errors'=>array(['code'=>404,'message'=>'OnlineFlight Not Found'])],404);
        }else{
            //OK
            return response()->json(['status'=>'ok','data'=>$onlineflight],200);
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
        $onlineflights = OnlineFlight::find($id);

        if (!$onlineflights)
        {
            return response()->json(['errors'=>array(['code'=>404,'message'=>'OnlineFlight Not Found'])],404);
        }else{
            $onlineflights->update($request->all());
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
        $onlineflight = OnlineFlight::find($id);
        if (!$onlineflights)
        {
            return response()->json(['errors'=>array(['code'=>404,'message'=>'OnlineFlight Not Found'])],404);
        }else{
            $onlineflights->delete();
            //OK
            return response()->json(['status'=>'ok'],200); 
        }
    }
}
