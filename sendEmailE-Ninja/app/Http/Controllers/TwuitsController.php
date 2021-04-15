<?php

namespace App\Http\Controllers;

use App\Models\Twuits;
use App\Models\Usuario;
use App\Models\PublicacionUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\EnvioTwuits;
use App\Mail\EnvioPublicaciones;
use Illuminate\Support\Facades\DB;


class TwuitsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $twuits = Twuits::get();
        // return view('emails.EnvioTwuits', $twuits); 
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
     * @param  \App\Models\Twuits  $twuits
     * @return \Illuminate\Http\Response
     */
    public function show(Twuits $twuits)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Twuits  $twuits
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Twuits $twuits)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Twuits  $twuits
     * @return \Illuminate\Http\Response
     */
    public function destroy(Twuits $twuits)
    {
        //
    }

    public function sendTwuits(Request $request){
        $usuario = usuario::where('correo', $request->correo)->first();
        if($usuario != null){
            $estado = $usuario->estado_id;
            if($estado == 1){
                $twuits = Twuits::get();
                // $twuits = DB::select ('SELECT publicaciones FROM twuits');
                // print_r($twuits);
                $details = [
                    'user'=> $usuario->nombres,
                    'twuit'=>$twuits
                ];
              //   Mail::to($user->email)->send(new TestMail($details));
              Mail::to($usuario->correo)->send(new EnvioTwuits($details));
                return 'send';
            }else{
                return response()->json([
                    'message'=>'Este usuario no esta disponible'
                ]);    
            }
        }else{
            return response()->json([
                'message'=>'Este correo electronico no es valido'
            ]);
        }
    }
    public function sendEventoUser(Request $request){
        $usuario = usuario::where('correo', $request->correo)->first();
        if($usuario != null){
            $estado = $usuario->estado_id;
            if($estado == 1){
                $publicacion = PublicacionUser::get();
                // $twuits = DB::select ('SELECT publicaciones FROM twuits');
                // print_r($publicacion);
                $details = [
                    'user'=> $usuario->nombres,
                    'twuit'=>$publicacion
                ];
              //   Mail::to($user->email)->send(new TestMail($details));
              Mail::to($usuario->correo)->send(new EnvioPublicaciones($details));
                return 'send';
            }else{
                return response()->json([
                    'message'=>'Este usuario no esta disponible'
                ]);    
            }
        }else{
            return response()->json([
                'message'=>'Este correo electronico no es valido'
            ]);
        }
    }
}
