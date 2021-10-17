<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/',                           [MainController::class, 'index'])->name('index');
Route::post('/',                          [AccountController::class, 'getOrderBy'])->name('getOrderBy');


Route::get('/accounts/create',            [AccountController::class, 'create'])->name('accounts.create');
Route::post('/accounts',                  [AccountController::class, 'store'])->name('accounts.store');
Route::get('/accounts/{account_id}',      [AccountController::class, 'show'])->name('accounts.show');
Route::get('/accounts/{account_id}/edit', [AccountController::class, 'edit'])->name('account.edit');
Route::put('/accounts/{account_id}/',      [AccountController::class, 'update'])->name('account.update');
Route::delete('/accounts/{account_id}',   [AccountController::class, 'destroy'])->name('account.destroy');
Route::get('/accounts/{column?}/{order?}', [AccountController::class, 'index'])->name('accounts.index');


Route::get('register',                    [UserController::class, 'create'])->name('register.create');
Route::post('register',                   [UserController::class, 'store'])->name('register.store');

Route::get('login',                       [UserController::class, 'loginForm'])->name('login.form');
Route::post('login',                      [UserController::class, 'login'])->name('login');
Route::get('logout',                      [UserController::class, 'logout'])->name('logout');
