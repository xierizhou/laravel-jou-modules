<?php


namespace Jou\Modules\Composer;


class Requirer extends Run
{
    public function __construct()
    {
        chdir(base_path());
    }

    /**
     * composer require
     * @param $package
     */
    public function require($package){
        $this->run("composer require {$package}");
    }

    /**
     * composer require --dev
     * @param $package
     */
    public function requireDev($package){
        $this->run("composer require --dev {$package}");
    }
}
