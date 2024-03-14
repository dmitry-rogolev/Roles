<?php

namespace Tests\Feature\Stubs\Database\Seeders;

use App\Models\Role;
use Database\Seeders\RoleSeeder;
use Tests\RefreshDatabase;
use Tests\TestCase;

class RoleSeederTest extends TestCase
{
    use RefreshDatabase;

    public function test_run(): void
    {
        $seeder = app(RoleSeeder::class);
        $count = count($seeder->getRoles());

        // Подтверждаем заполнение таблицы.
        $seeder->run();
        $this->assertCount($count, Role::all());

        // Подтверждаем отсутствие возможности повторного заполнения таблицы.
        $seeder->run();
        $this->assertCount($count, Role::all());
    }
}
