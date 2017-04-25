<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Usuari;
use App\Token;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $usuariDB = Usuari::whereRaw('Nick = ? ', [$request->Nick])->get()->first();

        if (is_null($usuariDB)) {     
            $resposta = 'usuari incorrecte';
        } else {
            if ($request->Contrasenya == $usuariDB->Contrasenya) {

                //generate token
                $tokenKey = bin2hex(random_bytes(16));
                //
                $params = array("token"=>$tokenKey, "usuari_id"=>$usuariDB->id);
                $token = Token::create($params);
                $resposta = $tokenKey;
            }else{
                $resposta = 'incorrecte';
            }
        }
        return $resposta ;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function destroy($token)
    {
        $tokenKey = Token::whereRaw('token = ? ', [$token])->get()->first();

        if (is_null($tokenKey)) { 
            $resposta = 'Token Error';    
        }else{
            $tokenKey->delete();
            $resposta = 'logout';    
        }
        return  $resposta ;
    }
}
