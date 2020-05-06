<?php


namespace Jou\Modules\Commands;

use Illuminate\Console\Command;
use Jou\Modules\Variable;
use Symfony\Component\Console\Input\InputArgument;

class ModulesReloadCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'module:reload {module}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '重新载入module的配置';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $module = $this->argument('module');
        echo $module;
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return [
            ['module', InputArgument::OPTIONAL, 'The name of module will be updated.'],
        ];
    }

    /**
     * Get Module namespace
     *
     * @return string
     */
    protected function getNameSpace(){
        return Variable::namespace;
    }

    /**
     * Get Module Json
     */
    protected function getModulesJson(){

        $namespace = $this->getNameSpace();


    }
}