<?php

namespace App\Http\Controllers;

use App\Models\PublicacionUser;
use Illuminate\Http\Request;
use App\Http\Requests\PublicacionRequest;

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
    public function store( PublicacionRequest $request)
    {
        $postUser = new PublicacionUser;
        $postUser->create($request->all());
        // print_r (PublicacionRequest);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PublicacionUser  $publicacionUser
     * @return \Illuminate\Http\Response
     */
    public function show(PublicacionUser $publicacionUser)
    {
        //
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
