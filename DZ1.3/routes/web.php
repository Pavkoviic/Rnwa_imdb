<?php
use App\Http\Controllers\MovieController;
use App\Http\Controllers\ActorsController;
use App\Http\Controllers\CastController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\LiveSearchController;



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


Route::get('/', [LiveSearchController::class, 'index']);
Route::get('/action', [LiveSearchController::class, 'action'])->name('action');

Route::resource('movies', MovieController::class);
Route::resource('actors',ActorsController::class);
Route::resource('cast',CastController::class);

Route::get('/search', [SearchController::class, 'search'])->name('search');



