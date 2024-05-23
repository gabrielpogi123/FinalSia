<?php

use App\Http\Controllers\CarController;
use App\Models\Car;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layout');
});

Route::get('/about', function() {
    return view('about');
});

Route::get('/home', function() {
    return view('home');
});

Route::get('/cars', function() {
    return view('cars');
});

Route::get('/scanner', function () {
    return view('scanner');
})->name('scanner');

Route::get('/cars', [CarController::class, 'index'])->name('cars');

Route::get('/cars/csv-all', [CarController::class, 'generateCSV']);

Route::get('/cars/pdf', [CarController::class, 'pdf']);

Route::post('/cars/import', [CarController::class, 'importCsv'])->name('car.import');

Route::delete('/cars/{car}', [CarController::class, 'destroy'])->name('car.delete');
