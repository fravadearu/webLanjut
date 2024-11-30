<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Master\KategoriController;
use App\Http\Controllers\Transaksi\ContentController;
use App\Http\Controllers\RegionController;

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
    return view('welcome');
});

Route::match(['get','post'],'/welcome', [HomeController::class, 'selamatDatang']);
Route::get('sampai', [HomeController::class, 'sampaiJumpa'])->name('sampai');
Route::resource('kategori', KategoriController::class);
Route::get('content', [ContentController::class, 'index']);
Route::resource('regions', RegionController::class);
Route::get('content/create', [ContentController::class, 'create']);
Route::post('content/create', [ContentController::class, 'store']);
Route::get('content/pdf/{id}', [ContentController::class, 'generatePDF']);
