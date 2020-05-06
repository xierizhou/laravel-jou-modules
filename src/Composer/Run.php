<?php


namespace Jou\Modules\Composer;


class Run
{
    /**
     * excel cmd
     * @param $cmd
     */
    public function run($cmd){
        passthru($cmd);
    }
}
