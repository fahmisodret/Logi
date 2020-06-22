<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Str;
use File;

class menuGenerator extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:menu {name}';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate Simple Menu';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    protected function getStub($type){
        return file_get_contents(resource_path("stubs/$type.stub"));
    }

    protected function view($name){
        $viewTemplate = str_replace(
            ['{{title}}', '{{titleData}}'],
            [$name, strtolower(Str::plural($name))],
            $this->getStub('View')
        );
        file_put_contents(resource_path('views/menu_view/'.strtolower(Str::plural($name)).'.blade.php'), $viewTemplate);
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $name = $this->argument('name');
        $this->view($name);
        //create api route
        File::append(base_path('routes/web.php'),
        "\nRoute::get('generate/{" . Str::plural(strtolower($name)) . "}/index', 'GeneratorController@index');");
    }
}
