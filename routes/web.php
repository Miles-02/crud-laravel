<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ListagemController;
use Illuminate\Http\Request;


/*
|--------------------------------------------------------------------------
| Web Routes
|-----------------arefas---------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('/tarefas')->group(function () {
    Route::get('/', [ListagemController::class, 'index'])->name('tarefas.index');

    Route::get('add', [ListagemController::class, 'add'])->name('tarefas.add');
    Route::post('add', [ListagemController::class, 'addAction'])->name('tarefas.addAction');

    Route::get('edit/{id}', [ListagemController::class, 'edit'])->name('tarefas.edit');
    Route::post('edit/{id}', [ListagemController::class, 'editAction'])->name('tarefas.editAction');

    Route::get('del/{id}', [ListagemController::class, 'delAction'])->name('tarefas.delAction');

});

