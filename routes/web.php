<?php

use App\Models\Customer;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Master\KategoriController;
use App\Http\Controllers\Transaksi\ContentController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\CustomerController;

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

Route::match(['get', 'post'], '/welcome', [HomeController::class, 'selamatDatang']);
Route::get('sampai', [HomeController::class, 'sampaiJumpa'])->name('sampai');
Route::resource('kategori', KategoriController::class);
Route::get('content', [ContentController::class, 'index']);
Route::resource('regions', RegionController::class);
Route::get('content/create', [ContentController::class, 'create']);
Route::post('content/create', [ContentController::class, 'store']);
Route::get('content/pdf/{id}', [ContentController::class, 'generatePDF']);
Route::get('content/excel', [ContentController::class, 'generateExcel']);


Route::group(['prefix' => 'customer'], function () {
    Route::get('/', [CustomerController::class, 'index'])->name('customers.index');
    Route::get('/create', [CustomerController::class, 'create'])->name('customers.create');
    Route::post('/', [CustomerController::class, 'store'])->name('customers.store');
    Route::get('/{id}', [CustomerController::class, 'show'])->name('customers.show');
    Route::get('/{id}/edit', [CustomerController::class, 'edit'])->name('customers.edit');
    Route::put('/{id}', [CustomerController::class, 'update'])->name('customers.update');
    Route::delete('/{id}', [CustomerController::class, 'destroy'])->name('customers.destroy');
    Route::get('/pdf/{id}', [CustomerController::class, 'generatePDF'])->name('customers.pdf');
});
