<?php

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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

use App\Http\Controllers\CatalogController;
Route::resource('catalogs', CatalogController::class);

use App\Http\Controllers\PictureController;
Route::resource('picture', PictureController::class);

//transaction

Route::get('/transactions', function () {
    // Users must confirm their password before continuing...
})->middleware(['auth', 'password.confirm']);

use App\Http\Controllers\TransactionController;
Route::resource('transactions', TransactionController::class);

//endtrx
