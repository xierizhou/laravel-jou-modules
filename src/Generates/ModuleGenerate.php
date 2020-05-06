<?php


namespace Jou\Modules\Generates;


use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Jou\Modules\Stub;


class ModuleGenerate extends ModuleRepository
{
    /**
     * create new module name
     * @var
     */
    private $name;

    /**
     * @var Filesystem
     */
    private $filesystem;

    /**
     * @var Stub
     */
    private $stub;

    /**
     * module activator
     * @var bool
     */
    private $activator;


    /**
     * laravel command instance.
     *
     * @var
     */
    private $command;

    public function __construct($name)
    {
        $this->name = ucfirst($name);

        $this->filesystem = new Filesystem();

        $this->stub = new Stub();
    }

    /**
     * get module name.
     *
     * @return mixed
     */
    public function getName(){
        return $this->name;
    }

    /**
     * set laravel command instance.
     *
     * @param Command $command
     * @return $this
     */
    public function setCommand(Command $command){
        $this->command = $command;
        return $this;
    }

    /**
     * set activator.
     *
     * @param boolean $bool
     * @return $this
     */
    public function setActivator(bool $bool){
        $this->activator = $bool;
        return $this;
    }

    /**
     * generate module.
     */
    public function make(){
        $this->makeModuleDirectory();//创建模块目录

        $this->makeModuleAllDirectory(); //创建模块基本母录

        $this->createStub();
    }

    /**
     * make module Directory
     */
    public function makeModuleDirectory(){
        if(!$this->filesystem->exists(app_path('Modules'))){
            $this->filesystem->makeDirectory(app_path('Modules'));
        }

        $this->filesystem->makeDirectory(modules_path($this->getName()));
    }

    /**
     * make module Directory
     */
    private function makeModuleJson(){
        $this->filesystem->put(
            modules_path($this->getName(),'module.json'),
            $this->stub->getModuleJsonStubContent($this->getName())
        );
    }

    /**
     * create http
     */
    public function makeModuleAllDirectory(){
        $this->filesystem->makeDirectory(modules_path($this->getName(),'Config'));
        $this->filesystem->makeDirectory(modules_path($this->getName(),'Console'));

        $this->filesystem->makeDirectory(modules_path($this->getName(),'Http'));
        $this->filesystem->makeDirectory(modules_path($this->getName(),'Http/Controllers'));
        $this->filesystem->makeDirectory(modules_path($this->getName(),'Http/Requests'));
        $this->filesystem->makeDirectory(modules_path($this->getName(),'Http/Middleware'));

        $this->filesystem->makeDirectory(modules_path($this->getName(),'Providers'));


        $this->filesystem->makeDirectory(modules_path($this->getName(),'Resources'));
        $this->filesystem->makeDirectory(modules_path($this->getName(),'Resources/view'));
        $this->filesystem->makeDirectory(modules_path($this->getName(),'Routes'));
    }

    /**
     * make module Directory
     */
    private function makeProvidersStub(){
        $this->filesystem->put(
            modules_path($this->getName(),'Providers/AppServiceProvider.php'),
            $this->stub->getStubContents('AppServiceProvider',['MODULE_NAME'=>$this->getName()])
        );

        $this->filesystem->put(
            modules_path($this->getName(),'Providers/RouteServiceProvider.php'),
            $this->stub->getStubContents('RouteServiceProvider',['MODULE_NAME'=>$this->getName()])
        );
    }

    /**
     * make module Directory
     */
    private function makeRouteStub(){
        $this->filesystem->put(
            modules_path($this->getName(),'Routes/web.php'),
            $this->stub->getStubContents('web',['MODULE_NAME'=>$this->getName()])
        );

        $this->filesystem->put(
            modules_path($this->getName(),'Routes/api.php'),
            $this->stub->getStubContents('api',['MODULE_NAME'=>$this->getName()])
        );
    }

    public function createStub(){
        $this->makeModuleJson();

        $this->makeProvidersStub();

        $this->makeRouteStub();
    }


}
