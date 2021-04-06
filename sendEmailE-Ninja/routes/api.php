<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\TwuitsController;
use Atymic\Twitter\Facades\Twitter;
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
Route::group(['middleware'=>['auth:sanctum']],function(){
Route::post('/logout',[UserController::class,'logout']); 
});

/* Route::get('/teewt', function ($hashtag) {
    $twitters = Twitter::getSearch(['q' => $hashtag, 'count' => 50]);
    $sentimientos = ['negative', 'positive', 'neutral'];
    $twitters_array = $twitters->statuses;
    foreach ($twitters_array as $twitter) {
        $traduccion = TranslateClient::translate('es', 'en', $twitter->text);
        $sentimiento = SentimentAnalysis::decision($traduccion);
        $sentimientos[] = $sentimiento;
    }
    $sentimiento_twitter = array_count_values($sentimientos);
    return view('twitter', compact('sentimiento_twitter', 'twitters_array', 'hashtag'));
}); */
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

