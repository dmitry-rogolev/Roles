<?php

namespace Tests\Feature\Console\Commands;

use App\Providers\RoleServiceProvider;
use Tests\TestCase;

class InstallCommandTest extends TestCase
{
    public function test_run(): void
    {
        $tag = RoleServiceProvider::TAG;

        $this->artisan($tag.':install')->assertOk();
        $this->artisan($tag.':install --factories')->assertOk();
        $this->artisan($tag.':install --migrations')->assertOk();
        $this->artisan($tag.':install --seeders')->assertOk();
        $this->artisan($tag.':install --models')->assertOk();
    }
}
