<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\User\Cadastros\CadClieController;
use App\Http\Controllers\User\Cadastros\CadFornecController;
use App\Http\Controllers\User\Cadastros\CadPetController;
use App\Http\Controllers\User\UserHomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/
Route::get('/', [LoginController::class,'login']);
Route::post('/login', [LoginController::class,'loginAccess'])->name('login.access');
Route::post('/forgot-password', [LoginController::class,'forgotPassword'])->name('login.forgot_password');

//---- Level - User
Route::prefix('/user')->group(function () {
    Route::get('/', [UserHomeController::class,'index']);

    //---- Cadastros
    Route::get('/cadastros/clientes', [CadClieController::class,'listaClientes']);
    Route::get('/cadastros/fornecedores', [CadFornecController::class,'listaFornecedores']);
    Route::get('/cadastros/pet', [CadPetController::class,'listaPet']);
});
