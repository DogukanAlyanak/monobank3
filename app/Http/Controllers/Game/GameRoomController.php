<?php

namespace App\Http\Controllers\Game;

use App\Http\Controllers\Controller;
use App\Models\Game\GameRoom;
use App\Models\Player;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class GameRoomController extends Controller
{
    public function create(): RedirectResponse
    {
        $authPlayerUUID = session('auth_player_uuid');
        $authPlayer = Player::where('uuid', $authPlayerUUID)->first();

        $gameRoom = GameRoom::create([
            'owner_player_id' => $authPlayer->id,
        ]);

        return redirect()->route('game.room.show', [$gameRoom->uuid]);
    }


    public function show(): View
    {
        return view('game.room.show');
    }
}
