<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\NotulensiController;
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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::controller(DashboardController::class)->group(function () {
    Route::get('beranda', 'index');
    Route::get('tes', 'test');
});

Route::controller(NotulensiController::class)->group(function () {
    Route::get('notulensi/create', 'create')->name('notulensi.create');
    Route::post('notulensi/store', 'store')->name('notulensi.store');
    //index
    Route::get('notulensi', 'index')->name('notulensi.index');
    // show detail notulensi
    Route::get('notulensi/{id}', 'showNotulensiByIdNotulensi')->name('notulensi.showNotulensiByIdNotulensi');
    Route::get('notulensi/json/datatable', 'getNotulensi')->name('notulensi.json');
});

require __DIR__.'/auth.php';
