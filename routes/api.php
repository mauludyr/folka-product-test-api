<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ProductController;

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

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

Route::group(['middleware' => 'jwt.auth'], function () {
    Route::get('/products', [ProductController::class, 'index']);
    Route::get('/products/{id}', [ProductController::class, 'show']);
});

Route::get('/tasted-products', [ProductController::class, 'indexTasted']);
Route::get('/origin-products', [ProductController::class, 'indexOrigin']);
Route::get('/species-products', [ProductController::class, 'indexSpecies']);
Route::get('/processing-products', [ProductController::class, 'indexProcessing']);
Route::get('/roastlevel-products', [ProductController::class, 'indexRoastLevel']);
