<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController as Auth;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\EmpleadosController;
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
Route::post('logout', [Auth::class, 'logout']);
Route::post('user/create', [UsersController::class, 'create']);

Route::get('/empleado', [EmpleadosController::class, 'getEmpleados']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
