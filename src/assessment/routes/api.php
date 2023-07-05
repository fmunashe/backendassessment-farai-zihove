<?php

use App\Http\Controllers\AreaController;
use App\Http\Controllers\ShopController;
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

Route::get('/areas', [AreaController::class, 'index']);
Route::get('/areas/{area}', [AreaController::class, 'show']);
Route::put('/areas/{area}', [AreaController::class, 'update']);
Route::post('/areas', [AreaController::class, 'store']);

Route::get('/shops', [ShopController::class, 'index']);
Route::get('/shops/{shop}', [ShopController::class, 'show']);
Route::put('/shops/{shop}', [ShopController::class, 'update']);
Route::post('/shops', [ShopController::class, 'store']);
