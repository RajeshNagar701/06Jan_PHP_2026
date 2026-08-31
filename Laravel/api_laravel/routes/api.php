<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// api routes here   localhost:8000/api/route_name


Route::get('/get_user',[UserController::class,'api_show']);
Route::get('/get_users/{id}',[userController::class,'api_show_single']); // single data
Route::get('/search/{key}',[userController::class,'search']);

Route::post('/post_user',[UserController::class,'api_store']);
Route::delete('/delete_user/{id}',[UserController::class,'api_destroy']);   

Route::put('/update_user/{id}',[userController::class,'api_update']); // update

Route::put('/updatestatus/{id}',[userController::class,'updatestatus']); // update
Route::delete('/delete/{id}',[UserController::class,'destroy']); // delete
Route::post('/login',[userController::class,'login']); // login