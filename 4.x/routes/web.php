<?php
use App\Http\Controllers\MovieController;
use App\Http\Controllers\ActorsController;
use App\Http\Controllers\CastController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\LiveSearchController;
use App\Http\Controllers\GoogleController;




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



Route::get('/movies',[MovieController::class, 'index'])->name('movies.index');

Route::get('/cast',[CastController::class, 'index'])->name('cast.index');


Route::get('/actors',[ActorsController::class, 'index'])->name('actors.index');

Route::controller(GoogleController::class)->group(function(){

    Route::get('login/google', 'redirectToGoogle')->name('login.google');

    Route::get('login/google/callback', 'handleGoogleCallback');

});

Route::group(['middleware' => 'auth'], function () {
    //actors
    Route::get('/actors/create',[ActorsController::class, 'create'])->name('actors.create');
    Route::get('/actors/{actors}/edit',[ActorsController::class, 'edit'])->name('actors.edit');
    Route::post('/actors',[ActorsController::class, 'store'])->name('actors.store');
    Route::get('/actors/{actor}',[ActorsController::class, 'show'])->name('actors.show');
    Route::put('/actors/{actor}',[ActorsController::class, 'update'])->name('actors.update');
    //movies
    Route::get('/movies/create',[MovieController::class, 'create'])->name('movies.create');
    Route::get('/movies/{movie}/edit',[MovieController::class, 'edit'])->name('movies.edit');
    Route::post('/movies',[MovieController::class, 'store'])->name('movies.store');
    Route::get('/movies/{movie}',[MovieController::class, 'show'])->name('movies.show');
    Route::put('/movies/{movie}',[MovieController::class, 'update'])->name('movies.update');
    //cast
    Route::get('/cast/create',[CastController::class, 'create'])->name('cast.create');
    Route::get('/cast/{cast}/edit',[CastController::class, 'edit'])->name('cast.edit');
    Route::post('/cast',[CastController::class, 'store'])->name('cast.store');
    Route::get('/cast/{cast}',[CastController::class, 'show'])->name('cast.show');
    Route::put('/cast/{cast}',[CastController::class, 'update'])->name('cast.update');


});


Route::group(['middleware' => 'auth','middleware' => 'is_admin'], function () {
    Route::delete('/actors/{actor}',[ActorsController::class, 'destroy'])->name('actors.destroy');
    Route::delete('/cast/{cast}',[CastController::class, 'destroy'])->name('cast.destroy');
    Route::delete('/movies/{movie}',[MovieController::class, 'destroy'])->name('movies.destroy');

});

Route::get('/',function(){
    return redirect('/movies');
})->name('/');

Route::get('/movies.orderbyDate',[MovieController::class, 'orderbyDate']);
Route::get('/actors.orderbyBirthDate',[ActorsController::class, 'orderbyBirthDate']);
Route::post('/movies.search', [MovieController::class, 'search'])->name('movie.search');
Route::post('/actor.search', [ActorsController::class, 'search'])->name('actors.search');
Route::get('/movies.fetch', [MovieController::class, 'fetch'])->name('movie.fetch');
Route::get('/actors.fetch', [ActorsController::class, 'fetch'])->name('actors.fetch');




Route::get('/ajax', [LiveSearchController::class, 'index']);
Route::get('/action', [LiveSearchController::class, 'action'])->name('action');
Route::get('/search', [SearchController::class, 'search'])->name('search');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();



