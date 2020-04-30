<?php

namespace App\Providers;

use App\Services\BaseHorse;
use App\Services\BlackHorse;
use App\Services\WhiteHorse;
use Illuminate\Support\ServiceProvider;

class HorseProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->bind(BaseHorse::class,function($app){
            // return new WhiteHorse();
            return new BlackHorse();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
