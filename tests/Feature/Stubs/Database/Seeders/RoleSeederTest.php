<?php

namespace Tests\Feature\Stubs\Database\Seeders;

use Database\Seeders\RoleSeeder;
use Tests\RefreshDatabase;
use Tests\TestCase;

class RoleSeederTest extends TestCase
{
    use RefreshDatabase;

    public function test_run(): void
    {
        $seeder = app(RoleSeeder::class);

        $seeder->run();
        $this->assertDatabaseCount('roles', count($seeder->getRoles()));

        // Подтверждаем отсутствие повторного заполнения таблицы.
        $seeder->run();
        $this->assertDatabaseCount('roles', count($seeder->getRoles()));
    }
}
