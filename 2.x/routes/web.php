<?php
use App\Http\Controllers\MovieController;
use App\Http\Controllers\ActorsController;
use App\Http\Controllers\CastController;
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


Route::resource('movies', MovieController::class);
Route::resource('actors',ActorsController::class);
Route::resource('cast',CastController::class);

Route::get('/',function(){
    return redirect('/movies');
});

Route::get('/movies.orderbyDate',[MovieController::class, 'orderbyDate']);
Route::get('/actors.orderbyBirthDate',[ActorsController::class, 'orderbyBirthDate']);