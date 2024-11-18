<?php

namespace App\Providers;

use App\Models\Game\GameRoom;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Move route binding logic here
        Route::bind('gameRoom', function ($value) {
            $gameRoom = GameRoom::findAny($value); // Use custom finder
            if (!$gameRoom) {
                abort(404, 'Game Room not found.');
            }
            return $gameRoom;
        });
    }
}
