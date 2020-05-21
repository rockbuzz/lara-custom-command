<?php

namespace Rockbuzz\LaraCustomCommand\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class UserPasswordRenew extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:password-renew {--pass=}';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'User password renew';

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
        $pass = $this->argument('pass');

        dd($pass);
    }
}
