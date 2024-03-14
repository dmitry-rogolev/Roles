<?php

namespace Tests;

use App\Providers\RoleServiceProvider;

class TestCase extends \Orchestra\Testbench\TestCase
{
    protected function getPackageProviders($app): array
    {
        return [
            RoleServiceProvider::class,
        ];
    }
}
