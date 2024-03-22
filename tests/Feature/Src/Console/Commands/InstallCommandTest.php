<?php

namespace Tests\Feature\Src\Console\Commands;

use Tests\TestCase;

class InstallCommandTest extends TestCase
{
    public function test_run(): void
    {
        $this->artisan('roles:install')->assertOk();
        $this->artisan('roles:install --models')->assertOk();
        $this->artisan('roles:install --factories')->assertOk();
        $this->artisan('roles:install --migrations')->assertOk();
        $this->artisan('roles:install --seeders')->assertOk();
    }
}
