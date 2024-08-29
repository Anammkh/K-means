<?php

use App\Http\Controllers\DaftarhadirController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataLansiaController;
use App\Http\Controllers\PosyanduController;
use App\Http\Controllers\JadwalkunjunganController;
use App\Http\Controllers\KmeansController;










Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::resource('data_lansia', DataLansiaController::class);
    Route::resource('jadwalkunjungan', JadwalkunjunganController::class);
    Route::resource('posyandu', PosyanduController::class);
    Route::resource('daftarhadir', DaftarhadirController::class);
    Route::prefix('kmeans')->name('kmeans.')->group(function () {
        Route::get('dataset', [KMeansController::class, 'dataset'])->name('dataset');
        Route::get('elbow', [KMeansController::class, 'elbow'])->name('elbow');
        Route::get('cluster', [KMeansController::class, 'cluster'])->name('cluster');
        Route::get('process', [KMeansController::class, 'process'])->name('process');
        Route::get('result', [KMeansController::class, 'result'])->name('result');
    });
});

