<?php

namespace Rockbuzz\LaraCustomCommand\Commands;

use Illuminate\Console\Command;

class CacheRenewAll extends Command
{

    protected $signature = 'cache:renew-all';

    protected $description = 'Cache renew all';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $this->call('cache:clear');
        $this->call('optimize');
        $this->call('view:cache');
        $this->info('Successfully renew all caches.');
    }
}
