<?php


namespace Jou\Modules\Providers;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\ServiceProvider;
use Arr;
class ModuleServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        if (!app()->runningInConsole()) {
            $files = new Filesystem();
            $directories = $files->directories(app_path('Modules'));
            foreach($directories as $item){
                $ds = explode('/',$item);
                $name = Arr::get($ds,count($ds)-1);
                if($files->exists($item.'/Providers/AppServiceProvider.php')){
                    $this->app->register("App\Modules\\".$name."\Providers\AppServiceProvider");
                }

            }
        }

    }
}
