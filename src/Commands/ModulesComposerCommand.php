<?php


namespace Jou\Modules\Commands;

use Illuminate\Console\Command;
use Jou\Modules\Composer\Installer;
use Jou\Modules\Composer\Requirer;
use Jou\Modules\Variable;
use Symfony\Component\Console\Input\InputArgument;
use Arr;
class ModulesComposerCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'module:composer {affect*}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '重新载入module的配置';

    /**
     * Requirer instance
     * @var
     */
    protected $requirer;

    protected $installer;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(Requirer $requirer,Installer $installer)
    {
        $this->requirer = $requirer;

        $this->installer = $installer;
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //更新哪个模块的composer
        $module = $this->choice('What is the name of your module?', ['Taylor', 'Dayle']);

        $affect = $this->argument('affect');

        $action = Arr::get($affect,0);


        $this->info("Start Execution Composer $action....");
        switch ($action){
            case "install":
                //$this->installer->setComposerJson();
                break;
            case "require-dev":
                $cmd = implode(' ',Arr::except($affect,0));
                $this->requirer->requireDev($cmd);
                break;
            case "require":
                $cmd = implode(' ',Arr::except($affect,0));
                $this->requirer->require($cmd);
                break;
            default :
                $this->error("ERROR:$action is not found!");
        }

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
