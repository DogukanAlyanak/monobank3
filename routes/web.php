<?php

use App\Http\Controllers\Game\GameRoomController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landing');
});


Route::get('game/rooms/create', [GameRoomController::class, 'create'])->name('game.room.create');
Route::post('game/rooms/store', [GameRoomController::class, 'store'])->name('game.room.store');

Route::get('game/rooms/{gameRoom}', [GameRoomController::class, 'show'])->name('game.room.show');
// Route::get('game/rooms', [GameRoomController::class, 'index'])->name('game.room.list');
