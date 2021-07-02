<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Braintree\Gateway;

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
    public function boot()
    {
        $this->app->singleton(Gateway::class, function($app){
            return new Gateway(
                [
                    'environment' => 'sandbox',
                    'merchantId' => 'k45tr8ybd5qpnj5v',
                    'publicKey' => '29m4jwnd446y5mw4',
                    'privateKey' => 'b907720d5b8c46f2055715a8889e9fbb'
                ]
            );
        });
    }
}

