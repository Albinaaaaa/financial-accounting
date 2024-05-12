<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DataController;
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

//Route::get('/data', [DataController::class, 'view'])->name('data.index');
//Route::get('/data/create', [DataController::class, 'create'])->name('data.create');


Route::put('/store', [DataController::class, 'store']);

//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Route::get('/get-additional-types', 'DataController@getAdditionalTypes')->name('get-additional-types');
//Route::resource('/data', DataController::class);
Route::get('data', [DataController::class, 'view'])->name('data.index');
Route::get('/data/create', [DataController::class, 'create'])->name('data.create');
Route::get('/data/get-additional-types/{id}', [DataController::class, 'actionGetAdditionalTypes']);
// laravel-grid-view не поддерживает метод DELETE
//Route::get('/quick-link/{id}/destroy', [QuickLinkController::class, 'destroy'])->name('quick-link.destroy');
Route::get('/dashboard', [DataController::class, 'chart'])->name('dashboard');


require __DIR__.'/auth.php';
