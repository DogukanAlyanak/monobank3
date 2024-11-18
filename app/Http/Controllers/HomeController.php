<?php

namespace App\Http\Controllers;

use App\Models\Game\GameRoom;
use App\Models\Player;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    // home
    public function index():View
    {

        $authPlayerUUID = session('auth_player_uuid');
        $authPlayer = Player::where('uuid', $authPlayerUUID)->first();

        $gameRooms = [];
        if ($authPlayer) {
            $gameRooms = GameRoom::where('owner_player_id', $authPlayer->id)->get();
        }

        return view('landing')->with('gameRooms', $gameRooms);
    }
}
