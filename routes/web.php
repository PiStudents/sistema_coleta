<?php

use App\Http\Controllers\ManageViewMapController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\SheetdbController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/mapas', function () {
    return view('maps');
});

Route::resource('materiais', MaterialController::class)->middleware(['auth', 'verified']);

Route::resource('manageMaps', ManageViewMapController::class)->middleware(['auth', 'verified']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/sheets', [SheetdbController::class, 'get'])->name('sheets');
Route::get('/sheets/create', [SheetdbController::class, 'create'])->name('sheets.create');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
