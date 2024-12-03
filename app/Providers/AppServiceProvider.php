<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;

use Illuminate\Support\Facades\Config;

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
/*
 if (env('APP_ENV') !== 'local') {
            $this->app['request']->server->set('HTTPS', true);
        }


 if (env('FORCE_HTTPS', true) && url()->current() != 'http://' . env('APP_URL', '192.168.0.1') . '/auth/callback') {
            URL::forceScheme('https');
            URL::forceRootUrl(Config::get('app.url'));
        }



*/

/*
if(env('FORCE_HTTPS', true) && url()->current() != 'http://' . env('APP_URL', '192.168.0.1') . '/auth/callback') {
            URL::forceScheme('https');
        }
*/


        $socialite = $this->app->make('Laravel\Socialite\Contracts\Factory');
//dd( $socialite);
        $socialite->extend(
            'spbstu',
            function ($app) use ($socialite) {
                $config = $app['config']['services.spbstu'];
                return $socialite->buildProvider(SpbstuProvider::class, $config);
            }
        );


    }
}
