<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\PictureController;
use App\Http\Controllers\TransactionController;



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


//kepalabiawak__ Halaman utama Tanpa Parameter
Route::get('/', function () {
    return view('home');
});
//endkepalabiawak__

//satpol
Auth::routes();
//endsatpol

//Route Catalog
Route::get('catalogs/{id}/picture', [CatalogController::class, 'pictures'])    //ada kelas tambahan
    ->name('catalogs.pictures');
Route::resource('catalogs', CatalogController::class);      //route dengan satu resource tujuan controller si catalog
//endroute catalog




Route::resource('picture', PictureController::class);       //route dengan satu resource tujuan controller si picture

//transaction

Route::resource('transactions', TransactionController::class);

//endtrx


// Route::get('/', 'DashboardController@index')->name('dashboard');

// Auth::routes(['register' => false]);

// Route::get('products/{id}/gallery', 'ProductController@gallery')
//     ->name('products.gallery');
// Route::resource('products', 'ProductController');

// Route::resource('product-galleries', 'ProductGalleryController');

// Route::get('transactions/{id}/set-status', 'TransactionController@setStatus')
//     ->name('transactions.status');
// Route::resource('transactions', 'TransactionController');
