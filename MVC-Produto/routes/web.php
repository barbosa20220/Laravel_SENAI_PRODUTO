<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/produto/listar',[ProdutoController::class, 'listar'])->name('produto.listar');

Route::get('/produto/cadastrar', [ProdutoController::class, 'cadastro'])->name('produto.cadastrar');

Route::post('/produto/salvar',[ProdutoController::class, 'add'])->name('produto.salvar');

Route::get('/produto/{id}/atualizar', [ProdutoController::class, 'atualizar'])->name('produto.atualizar');

Route::put('/produto/{id}/update',[ProdutoController::class, 'update'])->name('produto.update');