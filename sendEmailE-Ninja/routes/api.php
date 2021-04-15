<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\TwuitsController;
use App\Http\Controllers\PublicacionUserController;
use App\Models\Twuits;
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
Route::get('/sendTwuit', [TwuitsController::class, 'sendTwuits']);
Route::put('/usuario/{usuario}', [UsuarioController::class, 'decath']);
Route::get('/sendEmailUser',[TwuitsController::class, 'sendEventoUser']);
Route::group(['middleware'=>['auth:sanctum']],function(){
Route::post('/logout',[UserController::class,'logout']); 
});
Route::apiResource('/postUser',PublicacionUserController::class);
Route::get('/teewt', function()
{
    $twuitters = Twitter::getListStatuses(['list_id'=>1000]);
    foreach ($twuitters as $twuiter_array){
        $twuits = new Twuits;
        // $twuits->fecha="$twuiter_array->created_at";
        $twuits->publicaciones=$twuiter_array->text;
        $twuits->save(); 
    }
    return response()->json([
        'status_code'=>200,
        'message'=>'twuits created succesfully'
    ]);
	// return Twitter::getListStatuses(['list_id'=>1000]);
    // return Twitter::getSearch(['q'=>'RT']);
});
Route::get('/userTimeline', function()
{
   $tweets=Twitter::getSearch(['q' => 'emprendimiento']);
//    print_r ($tweets->statuses);
   foreach ($tweets->statuses as $tweet_array) {
        // echo $tweet_array->text;
        $twuits = new Twuits;
        $twuits->publicaciones=$tweet_array->text;
        $twuits->save();
    } 
    return response()->json([
        'status_code'=>200,
        'message'=>'twuits español enviado con exito!'
    ]);
});
    

