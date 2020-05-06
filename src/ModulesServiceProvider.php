<?php

namespace Jou\Modules;

use Illuminate\Support\ServiceProvider;
use Jou\Modules\Providers\RegisterServiceProvider;

class ModulesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerProvider();


    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

    }

    /**
     * Register Provider
     *
     * @return void
     */
    protected function registerProvider(){
        $this->app->register(RegisterServiceProvider::class);
    }
}
