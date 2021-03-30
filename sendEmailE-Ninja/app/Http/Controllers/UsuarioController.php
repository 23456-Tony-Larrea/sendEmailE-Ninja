<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return usuario::Where('estado_id',1)->latest()->paginate(2);
        return usuario::Where('estado_id',1)->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $usuario = new Usuario;
        $usuario->create($request->all());
        // return $usuario;
        // return 'guardado';
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function show(Usuario $usuario)
    {
        return $usuario;
    }

    public function buscador(Request $request)
    {
        // $credentials = $request('buscador');
        // print_r ($credentials);
        // $usuario = Usuario::where('apellidos','like', `%{$credentials}%`)->get();
        // return $usuario;
        $data = $request->json()->all();
        // $dataFilter = $data['filters']; 
        // $usuario = Usuario::where('usuarios', function($query) use ($dataFilter) {
        //     $query->where('nombres', $dataFilter['conditions']['text'])
        //     ->orWhere('apellidos', $dataFilter['conditions']['text'])
        //     ->where('estado_id', 1);
        // })->with('usuario');
        // return response()->json(['usuarios'=>$usuario],200);
        $dataFilter = $data['filters'];
        $usuario = Usuario::where(function($query) use ($dataFilter){
            $query('apellidos','like', '%' .strtoupper($request->filter). '%',);
        });
        return $usuario;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Usuario $usuario)
    {
        $usuario->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Usuario $usuario)
    {
        //
    }
}
