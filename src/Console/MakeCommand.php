<?php

namespace Aqjw\IPay88\Console;

use Illuminate\Console\Command;
use Illuminate\Console\DetectsApplicationNamespace;

class MakeCommand extends Command
{
    use DetectsApplicationNamespace;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ipay88:make';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Make a controller to process data';

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
     * @return void
     */
    public function handle()
    {
        file_put_contents(
            app_path('Http/Controllers/IPay88Controller.php'),
            $this->compileControllerStub()
        );

        $this->info('IPay88 Controller generated successfully.');
    }

    /**
     * Compiles the IPay88Controller stub.
     *
     * @return string
     */
    protected function compileControllerStub()
    {
        return str_replace(
            '{{namespace}}',
            $this->getAppNamespace(),
            file_get_contents(__DIR__ . '/stubs/controllers/IPay88Controller.stub')
        );
    }
}
