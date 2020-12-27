<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\deviceController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FileController;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(['middleware' => 'auth:sanctum'], function(){
    Route::get("list",[deviceController::class,'index']);
    Route::post("deviceCreate",[deviceController::class,'create']);
    Route::put("deviceUpdate",[deviceController::class,'update']);
    Route::get("search/{find}",[deviceController::class,'search']);
    Route::delete("deviceDelete/{id}",[deviceController::class,'destroy']);
    Route::get('/user', [FileController::class,'create']);
});


Route::post("login",[UserController::class,'index']);
Route::post('upload',[FileController::class, 'index']);