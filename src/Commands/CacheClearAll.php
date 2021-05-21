<?php

namespace Rockbuzz\LaraCustomCommand\Commands;

use Illuminate\Console\Command;

class CacheClearAll extends Command
{
    protected $signature = 'cache:clear-all';

    protected $description = 'Cache clear all';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $this->call('cache:clear');
        $this->call('config:clear');
        $this->call('route:clear');
        $this->call('view:clear');
        $this->info('Successfully clear all caches.');
    }
}
