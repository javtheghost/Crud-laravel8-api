<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProveedoreController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\AuthController;
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



//RUTAS PRODUCTOS

Route::get('/productos',[ProductoController::class,'indexla']);
Route::post('/productos',[ProductoController::class,'guardar']);
Route::get('/productos/{producto}',[ProductoController::class,'mirar']);
Route::delete('/productos/{id}',[ProductoController::class,'borrar']);
Route::put('/productos/{id}',[ProductoController::class,'actualizar']);

//RUTAS DE CATEGORIAS
Route::get('/categorias',[CategoriaController::class,'indexla']);
Route::post('/categorias',[CategoriaController::class,'guardar']);
Route::get('/categorias/{categoria}',[CategoriaController::class,'mirar']);
Route::delete('/categorias/{id}',[CategoriaController::class,'borrar']);
Route::put('/categorias/{id}',[CategoriaController::class,'actualizar']);

//RUTAS PROVEEDORES
Route::get('/proveedores',[ProveedoreController::class,'indexla']);
Route::post('/proveedores',[ProveedoreController::class,'guardar']);
Route::get('/proveedores/{proveedore}',[ProveedoreController::class,'mirar']);
Route::delete('/proveedores/{id}',[ProveedoreController::class,'borrar']);
Route::put('/proveedores/{id}',[ProveedoreController::class,'actualizar']);

//RUTAS USUARIOS
Route::post('/login',[UserController::class,'login']);
Route::post('/register',[UserController::class,'register']);

Route::middleware(['auth:api'])->group(function () {
   Route::get('/user',[UserController::class,'index']);
   Route::post('/logout',[UserController::class,'logout']);
});






