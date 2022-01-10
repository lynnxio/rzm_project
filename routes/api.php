<?php

use App\Http\Controllers\Api\AssetController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\EventController;
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

//public
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

//protected Route
Route::group(['middleware' => ['auth:sanctum']], static function () {

    //Main
    Route::resource('/assets', AssetController::class);
    Route::resource('/events', EventController::class);

    //Auth
    Route::post('/logout', [AuthController::class, 'logout']);
});
