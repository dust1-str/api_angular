<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController as Auth;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\EmpleadosController;
use App\Http\Controllers\EquiposController;
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
Route::post('login', [Auth::class, 'login']);
Route::post('user/create', [UsersController::class, 'create']);

Route::get('/equipo', [EquiposController::class, 'Index']);



// routes/web.php

Route::middleware(['JwtAuth'])->group(function () {
    Route::get('/equipos/index', [EquiposController::class, 'index']);
    Route::post('/equipos/store', [EquiposController::class, 'store']);
    Route::delete('/equipos/destroy/{id}', [EquiposController::class, 'destroy']);
    Route::post('/equipos/update/{id}', [EquiposController::class, 'update']);
    Route::post('logout', [Auth::class, 'logout']);

});
