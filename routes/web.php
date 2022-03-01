<?php

use App\Http\Controllers\Api\GameController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Models\Game;
use App\Models\User;
use Illuminate\Support\Facades\Route;


Route::get('/', [GameController::class,'index'])->name('home');


 Route::controller(GameController::class)->group(function () {
     Route::get('/games', 'index')->name('games.index');
     Route::get('/games/{game:slug}', 'edit');
     Route::post('/games/{id}', 'edit');
     Route::post('/games', 'store');
     Route::put('/games/{id}', 'update')->name('games.update');
     Route::delete('/games/{id}', 'destroy')->name('games.destroy');
     Route::get('state/{state}', [GameController::class, 'state']);
 });#->middleware('admin');


Route::get('authors/{author:name}', function(User $author) {
    return view('games.index', [
        'games' => $author->games
    ]);
});


Route::middleware('guest')->group(function () {
    Route::get('register', [RegisterController::class, 'create']);
    Route::post('register', [RegisterController::class, 'store']);
});



Route::get('/login', [SessionsController::class, 'create'])->middleware('guest');
Route::post('/login', [SessionsController::class, 'store'])->middleware('guest');
Route::post('/logout', [SessionsController::class, 'destroy'])->middleware('auth');


Route::get('admin/games/create',[GameController::class], 'create');


