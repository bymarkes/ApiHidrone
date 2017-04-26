<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Usuari;
use App\Missatge;

class MissatgesController extends Controller
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
            $missatges = Usuari::find($usuari->id)->missatges;
           //OK
            return response()->json(['status'=>'ok','data'=>$missatges],200);
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
        $newmissatge = Missatge::create($request->all());
        //OK
        return response()->json(['status'=>'ok'],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($nickname, $idmissatge)
    {
        $missatge = Missatge::find($idmissatge);
        if (!$missatge)
        {
            return response()->json(['errors'=>array(['code'=>404,'message'=>'Missatge Not Found'])],404);
        }else{
           //OK
            return response()->json(['status'=>'ok','data'=>$missatge],200);
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
    public function update(Request $request, $nickname ,$idmissatge)
    {
        $missatge = Missatge::find($idmissatge);
        if (!$missatge)
        {
            return response()->json(['errors'=>array(['code'=>404,'message'=>'Missatge Not Found'])],404);
        }else{
            $missatge->update($request->all());
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
    public function destroy($nickname, $idmissatge)
    {
        $missatge = Missatge::find($idmissatge);
        if (!$missatge)
        {
            return response()->json(['errors'=>array(['code'=>404,'message'=>'Missatge Not Found'])],404);
        }else{
            $missatge->delete();
            //OK
            return response()->json(['status'=>'ok'],200);
        }
    }
}
