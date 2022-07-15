<?php

use App\Http\Controllers\EmpleadoController;

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
Route::get('/empleados',[EmpleadoController::class, 'index']);
Route::post('/empleados',[EmpleadoController::class, 'create']);
Route::put('/empleados/{id}',[EmpleadoController::class, 'update']);
Route::get('/empleados/{id}',[EmpleadoController::class, 'show']);
Route::delete('/empleados/{id}',[EmpleadoController::class, 'delete']);

Route::get('/estadisticas', [EmpleadoController::class,'estadisticas']);
Route::get('/beca', [EmpleadoController::class,'beca']);
Route::get('/horario', [EmpleadoController::class,'horario']);
Route::get('/calificacion', [EmpleadoController::class,'calificacion']);
Route::get('/problemas', [EmpleadoController::class,'problemas']);
