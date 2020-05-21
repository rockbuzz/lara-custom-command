<?php

namespace Rockbuzz\LaraCustomCommand\Commands;

use Illuminate\Console\Command;

class DBShowTables extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:show-tables';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Show all tables.';

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
        $this->showTables();
    }

    protected function tableDonNotExist($table)
    {
        return ! \Illuminate\Support\Facades\Schema::hasTable($table);
    }

    protected function showTables()
    {
        $columns = \Illuminate\Support\Facades\DB::select("show tables");
        $headers = [
            'Name',
        ];
        $rows = collect($columns)->map(function ($column) {
            return get_object_vars($column);
        });
        $this->table($headers, $rows);
    }
}
