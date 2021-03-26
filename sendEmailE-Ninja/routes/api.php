<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::get('usuario', '\usuarioController');
Route::get('/usuarios', [UsuarioController::class, 'index']);
Route::get('/usuario/{usuario}', [UsuarioController::class, 'show']);
Route::post('/usuario', [UsuarioController::class, 'store']);
Route::put('/usuario/{usuario}', [UsuarioController::class, 'update']);
// Route::post('logueo', [UsuarioController::class, 'singin']);