<?php

namespace Tests;

use Illuminate\Foundation\Testing\RefreshDatabase;

class DBTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_describe_table()
    {
        $this->artisan('db:describe table_name')
            ->expectsOutput('Sorry, table not found.')
            ->assertExitCode(0);
    }

    /** @test */
    public function it_can_import()
    {
        $this->artisan('db:import /to/path/dump.sql')
            ->expectsOutput('Sorry, file /to/path/dump.sql not found.')
            ->assertExitCode(0);
    }
}
