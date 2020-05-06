<?php


namespace Jou\Modules\Providers;

use Illuminate\Support\ServiceProvider;
use Jou\Modules\Commands\ModulesComposerCommand;
use Jou\Modules\Commands\ModulesMakeCommand;
use Jou\Modules\Commands\ModulesReloadCommand;

class CommandServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                ModulesMakeCommand::class,
                ModulesReloadCommand::class,
                ModulesComposerCommand::class
            ]);
        }
    }
}
