<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\LoginController;
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

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/post-login', [LoginController::class, 'postlogin'])->name('postlogin');
Route::group(['middleware' => 'auth'], function () {
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/', [CompanyController::class, 'index'])->name('index.company');
    Route::get('/add-company', [CompanyController::class, 'addCompany'])->name('add.company');
    Route::post('/save-company', [CompanyController::class, 'save'])->name('save.company');
    Route::get('/edit-company/{company:id}', [CompanyController::class, 'edit'])->name('edit.company');
    Route::post('/update-company/{company:id}', [CompanyController::class, 'update'])->name('update.company');
    Route::get('/delete-company/{id}', [CompanyController::class, 'delete'])->name('delete.company');
});