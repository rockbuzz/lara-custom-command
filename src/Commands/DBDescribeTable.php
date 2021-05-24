<?php

namespace Rockbuzz\LaraCustomCommand\Commands;

use Illuminate\Console\Command;

class DBDescribeTable extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:describe {table : Table name}';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Show details about the structure of the table.';

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
        $table = $this->argument('table');
        if ($this->tableDonNotExist($table)) {
            $this->warn('Sorry, table not found.');
        } else {
            $this->showTableDetails($table);
        }
    }

    protected function tableDonNotExist($table)
    {
        return ! \Illuminate\Support\Facades\Schema::hasTable($table);
    }

    protected function showTableDetails($table)
    {
        $columns = \Illuminate\Support\Facades\DB::select("DESCRIBE {$table}");
        $headers = [
            'Field', 'Type', 'Null', 'Key', 'Default', 'Extra',
        ];
        $rows = collect($columns)->map(function ($column) {
            return get_object_vars($column);
        });
        $this->table($headers, $rows);
    }
}
