<?php

namespace Rockbuzz\LaraCustomCommand\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class DBImportDump extends Command
{

    protected $signature = 'db:import {file : File name with path}';

    protected $description = 'Import SQL dump.';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $file = $this->argument('file');
        if (! file_exists(base_path($file))) {
            $this->warn("Sorry, file {$file} not found.");
        } else {
            DB::unprepared(file_get_contents(base_path($file)));
        }
    }
}
