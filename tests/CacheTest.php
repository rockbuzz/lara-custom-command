<?php

namespace Tests;

class CacheTest extends TestCase
{
    /** @test */
    public function it_can_clear_all()
    {
        $this->artisan('cache:clear-all')
            ->expectsOutput('Application cache cleared!')
            ->expectsOutput('Configuration cache cleared!')
            ->expectsOutput('Route cache cleared!')
            ->expectsOutput('Compiled views cleared!')
            ->expectsOutput('Successfully clear all caches.')
            ->assertExitCode(0);
    }

    /** @test */
    public function it_can_renew_all()
    {
        $this->withoutExceptionHandling();
        $this->artisan('cache:renew-all')
            ->expectsOutput('Application cache cleared!')
            ->expectsOutput('Configuration cache cleared!')
            ->expectsOutput('Configuration cached successfully!')
            ->expectsOutput('Route cache cleared!')
            ->expectsOutput('Files cached successfully!')
            ->expectsOutput('Compiled views cleared!')
            ->expectsOutput('Blade templates cached successfully!')
            ->expectsOutput('Successfully renew all caches.')
            ->assertExitCode(0);
    }
}
