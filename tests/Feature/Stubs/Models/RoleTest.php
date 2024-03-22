<?php

namespace Tests\Feature\Stubs\Models;

use App\Models\Role;
use dmitryrogolev\Roles\Contracts\RoleHasRelations;
use Tests\Models\User;
use Tests\RefreshDatabase;
use Tests\TestCase;

class RoleTest extends TestCase
{
	use RefreshDatabase;

	public function test_has_relations(): void 
	{
		$this->assertInstanceOf(RoleHasRelations::class, app(Role::class));

		$role = Role::factory()->create();
		$user = User::factory()->create();
		$role->users()->attach($user->id);
		$this->assertDatabaseHas('role_user', ['role_id' => $role->id, 'user_id' => $user->id]);
	}
}
