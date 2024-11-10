<?php

namespace App\Http\Controllers;

use App\Models\Player;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;

class PlayerController extends Controller
{

    // create_uuid
    public function create_uuid(Request $request): JsonResponse
    {
        return DB::transaction(function () use ($request) {
            try {
                $request->validate([
                    'player_uuid' => 'nullable|string',
                    'player_name' => 'nullable|string',
                ]);

                // kullanıcı kayıtlıysa
                $player = Player::where('uuid', $request->input('uuid'))->first();

                // kullanıcı kayıtlı değilse
                if (is_null($player)) {
                    $player = new Player();
                }

                // ziyaretçinin ismini güncelle
                if (! is_null($request->input('player_name'))) {
                    $player->name = $request->input('player_name');
                }

                // ziyaretçiyi güncelle
                $player->save();

                // session a atama
                session(['auth_player_uuid' => $player->uuid]);

                // return true
                return response()->json([
                    'alert' => [
                        'type' => 'success',
                        'message' => 'success',
                    ],
                    'data' => [
                        'uuid' => $player->uuid,
                    ],
                ], 200);
            } catch (QueryException $e) {
                logger()->error($e);
                DB::rollBack();

                return response()->json([
                    'alert' => [
                        'type' => 'error',
                        'message' => $e,
                    ]
                ], 404);
            }
        });
    }

    public function save_name(Request $request): JsonResponse
    {
        return DB::transaction(function () use ($request) {
            try {
                $request->validate([
                    'player_uuid' => 'required|exists:players,uuid',
                    'player_name' => 'required|string',
                ]);


                $player = Player::where('uuid', $request->input('uuid'))->first();

                if (! is_null($player)) {
                    $player->name = $request->input('player_name');
                    $player->save();
                }

                return response()->json([
                    'alert' => [
                        'type' => 'success',
                        'message' => 'success',
                    ],
                ], 200);
            } catch (QueryException $e) {
                logger()->error($e);
                DB::rollBack();

                return response()->json([
                    'alert' => [
                        'type' => 'error',
                        'message' => $e,
                    ]
                ], 404);
            }
        });
    }
}
