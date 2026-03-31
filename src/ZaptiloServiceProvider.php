<?php

namespace Zaptilo\Whatsapp;

use Illuminate\Support\ServiceProvider;

class ZaptiloServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/zaptilo.php',
            'zaptilo'
        );

        $this->app->singleton('zaptilo', function () {
            return new Zaptilo();
        });
    }

    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/zaptilo.php' => config_path('zaptilo.php'),
        ], 'zaptilo-config');
    }
}
