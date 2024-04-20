<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VendedorController;
use App\Http\Controllers\VendaController;



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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/cadastrar-vendedor', [VendedorController::class, 'create'])->name('vendedor.create');
Route::post('/cadastrar-vendedor', [VendedorController::class, 'criarVendedor'])->name('vendedor.criarVendedor');
Route::get('/listar-vendedores', [VendedorController::class, 'listarVendedores'])->name('vendedor.listarVendedores');
Route::get('/vendedores/{id}/vendas', [VendedorController::class, 'listarVendas'])->name('vendedor.listarVendas');
Route::get('/vendas/lancar', [VendaController::class, 'create'])->name('venda.create');
Route::post('/vendas/lancar', [VendaController::class, 'lancarVenda'])->name('venda.lancarVenda');