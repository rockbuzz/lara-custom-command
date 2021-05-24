<?php

namespace Tests;

use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_password_renew()
    {
        $email = 'test@email.com';
        $pass = 'newpass';

        $this->artisan("user:pass {$email} {$pass}")
            ->expectsOutput('User does not exist!')
            ->assertExitCode(0);

        DB::table('users')->insert([
            'name' => 'Test Name',
            'email' => $email,
            'password' => bcrypt(123456)
        ]);

        $this->artisan("user:pass {$email} {$pass}")
            ->expectsOutput("Password renewed successfully {$email}:{$pass}")
            ->assertExitCode(0);
    }
}
