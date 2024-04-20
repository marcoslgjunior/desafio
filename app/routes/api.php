<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VendedorController;
use App\Http\Controllers\VendaController;


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

Route::post('/vendedores', [VendedorController::class, 'criarVendedor']);
Route::post('/listar', [VendedorController::class, 'listarVendedores']);
Route::get('/listarVendedor/{id}/vendas', [VendedorController::class, 'listarVendas']);

Route::post('/vendas', [VendaController::class, 'lancarVenda']);
