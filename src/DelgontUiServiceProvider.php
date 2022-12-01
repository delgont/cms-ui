<?php

namespace Delgont\CmsUi;

use Illuminate\Support\ServiceProvider;

use Delgont\CmsUi\Console\InstallCommand;
use Delgont\CmsUi\Concerns\BootComposers;

class DelgontUiServiceProvider extends ServiceProvider
{
    use BootComposers;
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'delgont');

        if ($this->app->runningInConsole()) {
            $this->registerPublishables();
        }
        $this->registerCommands();
        $this->bootComposers();
    }

    private function registerPublishables() : void
    {
        // Publish Assets
        $this->publishes([
            __DIR__.'/../assets' => public_path(),
          ], 'delgont-assets');

    }

    private function registerCommands() : void
    {
        $this->commands([
            InstallCommand::class
        ]);
    }

  
}
