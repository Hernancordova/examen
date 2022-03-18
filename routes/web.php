<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;

use App\Http\Controllers\Admin\NavigationMenuController as AdminNavigationMenuController;
use App\Http\Controllers\Admin\MovieController as AdminMovieController;



Route::get('/', function () {
    return view('client.index');
});
Route::get('/',[HomeController::class, 'index'])->name('index');


Route::middleware('auth')->group(function() {
  Route::resource('/dashboard', DashboardController::class);
  Route::resource('usuario', UserController::class);
  Route::post('usuario/update-is-active/{usuario}', [UserController::class, 'updateIsActive'])->name('usuario.updateIsActive');

  Route::group(['prefix' => 'admin', 'as' => 'admin.'], function() {
    Route::resource('/menu', AdminNavigationMenuController::class);
    Route::post('menu/update-is-active/{menu}', [AdminNavigationMenuController::class, 'updateIsActive'])->name('menu.updateIsActive');

    Route::resource('/movie', AdminMovieController::class);
    Route::post('movie/update-is-active/{movie}', [AdminMovieController::class, 'updateIsActive'])->name('movie.updateIsActive');


  });
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
