<?php

namespace App\Http\Controllers;

use App\Models\PublicacionUser;
use Illuminate\Http\Request;

class PublicacionUserController extends Controller
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PublicacionUser  $publicacionUser
     * @return \Illuminate\Http\Response
     */
    public function show(PublicacionUser $publicacionUser)
    {
        $postUser=new PublicacionUser;
        $postUser->nombre=$publicacionUser->nombre;
        $postUser->email=$publicacionUser->email;
        $postUser->tituloEvento=$publicacionUser->tituloEvento;
        $postUser->tematicaEvento=$publicacionUser->tematicaEvento;
        $postUser->enlaceEvento=$publicacionUser->enlanceEvento;
        $postUser->fechaEvento=$publicacionUser->fechaEvento;
         if($postUser){
            return ["Result"=>"creado con exito"];
        }else{
             
           return ["Result"=>"fallo"];
         }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PublicacionUser  $publicacionUser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PublicacionUser $publicacionUser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PublicacionUser  $publicacionUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(PublicacionUser $publicacionUser)
    {
        //
    }
}
