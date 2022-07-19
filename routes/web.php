<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\LivroController;
use App\Http\Controllers\AlunoController;
use App\Http\Controllers\EmprestimoController;

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
Auth::routes();

Route::get('/', function () {
    return view('home');
});
 
Route::resource('/livros', LivroController::class);
Route::resource('/alunos', AlunoController::class);
Route::resource('/emprestimos', EmprestimoController::class);

Route::get('/fetch-users', [AlunoController::class, 'fetchUser']);
Route::get('/fetch-books', [LivroController::class, 'fetchBook']);
Route::get('/historico', [EmprestimoController::class, 'historico'])->name('historico');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');