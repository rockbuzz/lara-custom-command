<?php

namespace Rockbuzz\LaraCustomCommand\Commands;

use Illuminate\Support\Str;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class UserPasswordRenew extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:password-renew {email} {pass?}';
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
        $email = $this->argument('email');
        $pass = $this->argument('pass');

        $row = DB::table('users')->where('email', $email);        

        if ($row->exists()) {

            $pass = $pass ?? Str::random(8);

            $row->update(['password' => bcrypt($pass)]);

            $user = $row->first();

            return $this->info("Password renewed successfully {$user->email}:{$pass}");
        }

        $this->warn('User does not exist!');
    }
}
