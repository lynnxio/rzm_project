<?php

use App\Http\Controllers\AssetController;
use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', static function () {
    return redirect()->route('assets.index');
});

Route::middleware(['auth'])->group(function () {
    [
        Route::resource('assets', AssetController::class),
        Route::resource('events', EventController::class),
    ];
});


require __DIR__ . '/auth.php';
