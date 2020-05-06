<?php


namespace Jou\Modules;


use Illuminate\Container\Container;

class Module extends Container
{
    protected $name;

    public function __construct(string $name)
    {
        $this->name;
    }

    public function getName(){
        return $this->getName();
    }

    public function getModuleAttr($key,$default=null){
        return $this->json('module.json')->get($key,$default=null);
    }

    public function getModuleAttrs(){
        return $this->json('module.json')->toArray();
    }

    public function getModuleProviders(){
        return $this->getModuleAttr('composer.extra.laravel.providers');
    }

    public function json($file = null){
        return new Json(modules_path($this->getName(),$file));
    }
}
