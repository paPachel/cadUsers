<?php

use App\Http\Controllers\usuarioController;
use App\Http\Controllers\AuthController;
use App\Models\usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/usuarios',[usuarioController::class, 'index']);
Route::post('/registrar', [AuthController::class, 'registrar']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/usuarios/{id}', [usuarioController::class, 'show']);


Route::group(['middleware' => ['auth:sanctum']], function(){
    Route::post('/usuarios',[usuarioController::class, 'store']);
    Route::get('/usuarios/buscar/{email}', [usuarioController::class, 'buscar']);
    Route::post('/usuarios/{id}',[usuarioController::class, 'update']);
    Route::delete('/usuarios/{id}',[usuarioController::class, 'destroy']);
    Route::post('/logout', [AuthController::class, 'logout']);
});


//Route::get('/usuarios', function(){
//    return 'teste';
//});

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/
