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
        //
    }

    public function routeBindings(): void{
        Route::model('gameRoom', function ($value) {
            return GameRoom::findAny($value);
        });
    }
}
