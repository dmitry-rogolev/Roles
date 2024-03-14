<?php

namespace Tests\Feature\Stubs\Database\Factories;

use App\Models\Role;
use Tests\RefreshDatabase;
use Tests\TestCase;

class RoleFactoryTest extends TestCase
{
    use RefreshDatabase;

    public function test_create(): void
    {
        $this->assertModelExists(Role::factory()->create());
    }
}
