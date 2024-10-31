<?php

namespace App\Managers\Games;

use App\Models\Game\GameRoom;

class GameRoomManager
{
  public function create() {
    return GameRoom::create();
  }
}
