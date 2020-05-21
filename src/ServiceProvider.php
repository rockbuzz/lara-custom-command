<?php

namespace Rockbuzz\LaraCustomCommand;

use Illuminate\Support\ServiceProvider as SupportServiceProvider;
use Rockbuzz\LaraCustomCommand\Commands\CacheClearAll;
use Rockbuzz\LaraCustomCommand\Commands\CacheRenewAll;
use Rockbuzz\LaraCustomCommand\Commands\DBDescribeTable;
use Rockbuzz\LaraCustomCommand\Commands\DBImportDump;
use Rockbuzz\LaraCustomCommand\Commands\DBShowTables;
use Rockbuzz\LaraCustomCommand\Commands\UserPasswordRenew;

class ServiceProvider extends SupportServiceProvider
{
    public function boot()
    {
        //
    }

    public function register()
    {
        $this->commands([
            CacheClearAll::class,
            CacheRenewAll::class,
            DBShowTables::class,
            DBDescribeTable::class,
            DBImportDump::class,
            UserPasswordRenew::class
        ]);
    }
}
