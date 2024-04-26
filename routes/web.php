<?php

use App\Http\Controllers\PetController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';



Route::resource('/pets', PetController::class);

Route::get('/pets', [PetController::class, 'index'])->name('pets.index');

Route::get('/pets/create', [PetController::class, 'create'])->name('pet.create');
Route::post('/pets', [PetController::class, 'store'])->name('pets.store');



// /pets/create から /pets へのリダイレクト
Route::post('/pets/create', function () {
    return redirect()->route('pets.index');
});

Route::get('/pets/edit/{pet}', 'App\Http\Controllers\PetController@edit')->name('pet.edit');
Route::put('/pets/edit/{pet}','App\Http\Controllers\PetController@update')->name('pet.update');

Route::get('/pets/show/{pet}', 'App\Http\Controllers\PetController@show')->name('pet.show');

Route::delete('/pets/{pet}', 'App\Http\Controllers\PetController@destroy')->name('pet.destroy');


