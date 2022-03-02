<?php

use App\Http\Controllers\AdminGameController;
use App\Http\Controllers\Api\GameController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Models\Game;
use App\Models\User;
use Illuminate\Support\Facades\Route;



// Rutas game

Route::controller(GameController::class)->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get('games/{game:slug}', 'show');

 });

// por author
Route::get('authors/{author:name}', function(User $author) {
    return view('games.index', [
        'games' => $author->games
    ]);
});

// recursos para el usuario guest
Route::middleware('guest')->group(function () {
    Route::get('register', [RegisterController::class, 'create']);
    Route::post('register', [RegisterController::class, 'store']);
});


// sistema login
Route::controller(SessionsController::class)->group(function () {
    Route::get('/login', 'create')->middleware('guest');
    Route::post('/login', 'store')->middleware('guest');
    Route::post('/logout', 'destroy')->middleware('auth');

 });


// RUTAS ADMIN
Route::controller(AdminGameController::class)->group(function () {
    Route::get('admin/games/create',  'create')->middleware('admin'); // Este tambien
    Route::post('admin/games', 'store')->middleware('admin');
    Route::get('admin/games/', 'index')->middleware('admin');
    Route::get('admin/games/{game:id}/edit', 'edit')->middleware('admin');
    Route::patch('admin/games/{game:id}', 'update')->middleware('admin');
    Route::delete('admin/games/{game:id}', 'destroy')->name('games.destroy')->middleware('admin');
});

