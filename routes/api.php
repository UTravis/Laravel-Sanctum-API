<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Models\Product;
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


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


//public routes
Route::get('/products', [PostController::class, 'index']);

Route::get('/products/{id}', [PostController::class, 'show']);

Route::get('products/search/{name}', [PostController::class, 'search']);

Route::post('/register', [AuthController::class, 'register']);

Route::post('/login', [AuthController::class, 'login']);




//protected routes
Route::group(['middleware' => ['auth:sanctum']], function () {
  Route::post('/products', [PostController::class, 'store']);
  Route::put('/products/{id}', [PostController::class, 'update']);
  Route::delete('/products/{id}', [PostController::class, 'destroy']);
  Route::post('/logout', [AuthController::class, 'logout']);
});
