<?php

namespace App\Providers;

use Illuminate\Routing\UrlGenerator;
use ConsoleTVs\Charts\Registrar as Charts;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Charts $charts, UrlGenerator $url)
    {
        if(env('APP_ENV') !== 'local')
        {
            $url->forceScheme('https');
        }

        Paginator::useBootstrap();
        $charts->register([
            \App\Charts\SampleChart::class
        ]);
    }
}
