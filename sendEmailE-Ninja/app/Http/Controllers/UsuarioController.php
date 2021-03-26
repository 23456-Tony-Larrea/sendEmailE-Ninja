<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\usuario;
use Illuminate\Support\Facades\DB;

class UsuarioController extends Controller
{
    //traer todos los ususarios
    public function index()
    {
        return usuario::get();
    }

    //traer un usuario
    public function show(Usuario $usuario)
    {
        return $usuario;
    }

    //crear un usuario
    public function store(Request $request)
    {
        $usuario = new Usuario;
        $usuario->create($request->all());
        // return $usuario;
        // return 'guardado';
    }
    
    //actualizar un usuario
    public function update(Request $request, Usuario $usuario)
    {
        $usuario->update($request->all());
    }

    //Logueo
    // public function singin(Request $request)
    // {
    //     request()->validate([
    //         'correo' => 'required',
    //         'contrasena' => 'required'
    //     ]);
    //     $credentials = $request('correo');
    //     print_r($credentials);
    //     // $sql="select * from persona where correo_electronico = '$credentials'";
    //     // print_r($sql);
    //     // if(usuario::get($credentials)){
    //     //     return usuario::get();
    //     // }
    //     // return 'Correo o contraseña incorrectas';

    // }
}
