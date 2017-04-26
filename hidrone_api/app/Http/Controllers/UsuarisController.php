<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Usuari;
use App\Drone;

class UsuarisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuaris = Usuari::all();
        //OK
        return response()->json(['status'=>'ok','data'=>$usuaris],200);
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
       $newusuari = Usuari::create($request->all());
       
       //OK
       return response()->json(['status'=>'ok'],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($nickname)
    {
        $usuari = Usuari::whereRaw('Nick = ? ', [$nickname])->get()->first();
        if (!$usuari)
        {
            return response()->json(['errors'=>array(['code'=>404,'message'=>'Usuari Not Found'])],404);
        }else{
           //OK
            return response()->json(['status'=>'ok','data'=>$usuari],200);
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
    public function update(Request $request, $nickname)
    {
        $usuari = Usuari::whereRaw('Nick = ? ', [$nickname])->get()->first();
        if (!$usuari)
        {
            return response()->json(['errors'=>array(['code'=>404,'message'=>'Usuari Not Found'])],404);
        }else{
            $usuari->update($request->all());
           //OK
            return response()->json(['status'=>'ok','data'=>$usuari],200);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($request)
    {
        $tokenKey = Token::whereRaw('token = ? ', [$request->token])->get()->first();
        if (!$tokenKey) { 
            return response()->json(['errors'=>array(['code'=>404,'message'=>'Bad Token'])],404);
        }else{
            $usuari = Usuari::whereRaw('Nick = ? ', [$nickname])->get()->first();
            if (!$usuari)
            {
                return response()->json(['errors'=>array(['code'=>404,'message'=>'Usuari Not Found'])],404);
            }else{
                $usuari->delete();
               //OK
                return response()->json(['status'=>'ok'],200);
            }
        }
    }
}
