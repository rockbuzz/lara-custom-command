<?php

namespace Rockbuzz\LaraCustomCommand\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class CacheRenewAll extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cache:renew-all';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Cache renew all';

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
    
        Artisan::call('optimize');
        $this->info(
            'Configuration cache cleared!'. PHP_EOL .
            'Configuration cached successfully!'. PHP_EOL .
            'Route cache cleared!'. PHP_EOL .
            'Routes cached successfully!'. PHP_EOL .
            'Files cached successfully!'
        );
        
        Artisan::call('view:cache');
        $this->info(
            'Compiled views cleared!'. PHP_EOL .
            'Blade templates cached successfully!'
        );
    }
}
