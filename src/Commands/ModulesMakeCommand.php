<?php

namespace Jou\Modules\Commands;

use Illuminate\Console\Command;
use Jou\Modules\Generates\ModuleGenerate;

class ModulesMakeCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'module:make {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function handle()
    {
        app(ModuleGenerate::class,['name'=>$this->argument('name')])->make();
    }
}
