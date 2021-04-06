<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UsuarioController;
use Atymic\Twitter\Facades\Twitter;
use App\Http\Controllers\TwuitsController;
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
Route::post('/register',[UserController::class,'register']);
Route::post('/login',[UserController::class,'login']);
Route::apiResource('/usuarios', UsuarioController::class);
Route::get('/buscador', [UsuarioController::class, 'buscador']);  
Route::get('/sendEmail',[UserController::class,'resetPassword']); 
Route::get('/user/{user}', [UserController::class, 'showUser']);
Route::put('/user/{user}', [UserController::class, 'uptadeUser']);
Route::group(['middleware'=>['auth:sanctum']],function(){
Route::post('/logout',[UserController::class,'logout']); 
});

Route::get('/teewt', function()
{
	return Twitter::getListStatuses(['list_id'=>1000]);
    // return Twitter::getSearch(['q'=>'RT']);
});
