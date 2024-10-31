<?php

namespace App\Http\Controllers\Game;

use App\Http\Controllers\Controller;
use App\Models\Game\GameRoom;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class GameRoomController extends Controller
{
    public function create(): RedirectResponse
    {

        $gameRoom = GameRoom::create();

        return redirect()->route('game.room.show', [$gameRoom->uuid]);
    }

    public function show(): View
    {
        return view('game.room.show');
    }
}
