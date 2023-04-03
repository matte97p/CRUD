<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/test', [ProductsController::class, 'index']);//->middleware('auth:sanctum');                //C

// Route::middleware('api')->group(function () {
//     Route::get('test', [ProductsController::class, 'index']);
// });

Route::group(['prefix' => '/product'], function () {
    Route::post('/store', [ProductsController::class, 'store']);//->middleware('auth:sanctum');                //C
    Route::post('/index', [ProductsController::class, 'index']);//->middleware('auth:sanctum');                //R
    Route::post('/update/{id}', [ProductsController::class, 'update']);//->middleware('auth:sanctum');         //U
    Route::delete('/delete/{id}', [ProductsController::class, 'delete']);//->middleware('auth:sanctum');       //D
});
