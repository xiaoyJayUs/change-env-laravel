<?php

namespace XiaoyJayUs\ChangeEnv\Laravel;


use XiaoyJayUs\ChangeEnv\Laravel\Console\ChangeEnv;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class ChangeEnvServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application events.
     * @return void
     */
    public function boot()
    {
        $configPath = __DIR__ . '/config.php';
        $publishPath = config_path('change-env.php');
        $this->publishes([$configPath => $publishPath], 'config');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //$configPath = __DIR__ . '/config.php';
        //$this->mergeConfigFrom($configPath, 'change-env');

        $this->app->singleton(
            'command.xy.change-env',
            function ()  {
                return new ChangeEnv();
            }
        );

        $this->commands(
            'command.xy.change-env'
        );
    }
}
