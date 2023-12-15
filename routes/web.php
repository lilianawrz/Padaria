<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('dashboard');
});
Route::get('dashboard', function () {
    return view('dashboard');
});

// Rotas para listar e exibir detalhes dos produtos
Route::get('produtos', [ProdutoController::class, 'index'])->name('produtos.index');
Route::get('produtos/{produto}', [ProdutoController::class, 'show'])->name('produtos.show');

// Rotas para criar e armazenar novos produtos
Route::get('produtos/create', [ProdutoController::class, 'create'])->name('produtos.create');
Route::post('produtos', [ProdutoController::class, 'store'])->name('produtos.store');

// Rotas para editar e atualizar produtos existentes
Route::get('produtos/{produto}/edit', [ProdutoController::class, 'edit'])->name('produtos.edit');
Route::put('produtos/{produto}', [ProdutoController::class, 'update'])->name('produtos.update');

// Rota para excluir produtos
Route::delete('produtos/{produto}', [ProdutoController::class, 'destroy'])->name('produtos.destroy');
