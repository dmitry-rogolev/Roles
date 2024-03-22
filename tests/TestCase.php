<?php

namespace Tests;

use dmitryrogolev\Roles\Providers\RolesServiceProvider;

abstract class TestCase extends \Orchestra\Testbench\TestCase
{
    protected function getPackageProviders($app): array
    {
        return [
            RolesServiceProvider::class,
        ];
    }
}
