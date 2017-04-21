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
        $missatges = Usuari::find($usuari->id)->missatges;
        return response()->json(['missatges' => $missatges]);
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
        return 'Done';
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
        return response()->json(['missatge' => $missatge]);
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
    public function destroy($nickname, $idmissatge)
    {
        $missatge = Missatge::find($idmissatge);
        $missatge->delete();
         return redirect('usuaris/'.$nickname.'/missatges');
    }
}
