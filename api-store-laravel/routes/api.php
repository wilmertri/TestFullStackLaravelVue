<?php

use App\Http\Controllers\Api\V1\AuthController;
use App\Http\Controllers\Api\V1\PedidoController;
use App\Http\Controllers\Api\V1\ProductoController;
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

//api/v1/
Route::group(['prefix' => 'v1', 'namespace' => 'App\Http\Controllers\Api\V1'], function() {
    Route::apiResource('productos', ProductoController::class);
    Route::apiResource('pedidos', PedidoController::class);
    Route::get('pedidos/buscar-pedido/{fecha}', [PedidoController::class, 'getPedidoPorFecha'])->name('pedidos.buscar-pedido');
    Route::get('pedidos/alistamiento/{pedido}', [PedidoController::class, 'getAlistamientoPedidos'])->name('pedidos.alistamiento');
    Route::controller(AuthController::class)->group(function(){
        Route::post('login', 'login');
        Route::post('logout', 'logout');
        Route::post('refresh', 'refresh');
        Route::post('register', 'register');
        Route::get('user', 'user');
    });
});
