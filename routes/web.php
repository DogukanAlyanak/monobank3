<?php

use App\Http\Controllers\Game\GameRoomController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PlayerController;
use Illuminate\Support\Facades\Route;


// Home
Route::get('/', [HomeController::class, 'index'])->name('home');

// Game
Route::get('game/rooms/create', [GameRoomController::class, 'create'])->name('game.room.create');

Route::get('game/rooms/create', [GameRoomController::class, 'create'])->name('game.room.create');
Route::post('game/rooms/store', [GameRoomController::class, 'store'])->name('game.room.store');

Route::get('game/rooms/{gameRoom}', [GameRoomController::class, 'show'])->name('game.room.show');
Route::post('game/rooms/join', [GameRoomController::class, 'join'])->name('game.room.join');


// Create Player UUID
Route::post('/player/create_uuid', [PlayerController::class, 'create_uuid'])->name('player.create_uuid');

// Save Player Name
Route::post('/player/save_name', [PlayerController::class, 'save_name'])->name('player.save_name');
