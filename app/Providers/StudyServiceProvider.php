<?php

namespace App\Providers;

use App\Services\StudyService;
use Illuminate\Support\ServiceProvider;

class StudyServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->bind(StudyService::class,function($app){
            return new StudyService();
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
