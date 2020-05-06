<?php


namespace Jou\Modules\Providers;

use Illuminate\Support\ServiceProvider;
class RegisterServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //注册所有命令行
        $this->app->register(CommandServiceProvider::class);

        //注册所有模块提供者
        $this->app->register(ModuleServiceProvider::class);
    }


}
