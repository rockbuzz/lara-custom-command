<?php

namespace Rockbuzz\LaraCustomCommand\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class CacheClearAll extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cache:clear-all';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Cache clear all';

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
        Artisan::call('cache:clear');
        $this->info('Application cache cleared!');

        Artisan::call('config:clear');
        $this->info('Configuration cache cleared!');

        Artisan::call('route:clear');
        $this->info('Route cache cleared!');
        
        Artisan::call('view:clear');
        $this->info('Compiled views cleared!');
    }
}
