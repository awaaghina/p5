<?php

use App\Models\Produk;
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

    $produk = Produk::all();
    return view('welcome', compact ('produk'));
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//
Route::resource('kategori', App\Http\Controllers\KategoriController::class)->middleware('auth');
Route::resource('merek', App\Http\Controllers\MerekController::class)->middleware('auth');
Route::resource('produk', App\Http\Controllers\ProdukController::class)->middleware('auth');
