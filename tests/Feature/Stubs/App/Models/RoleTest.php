<?php

namespace Tests\Feature\Stubs\App\Models;

use App\Models\Role;
use Tests\Models\Group;
use Tests\Models\User;
use Tests\RefreshDatabase;
use Tests\TestCase;

class RoleTest extends TestCase
{
	use RefreshDatabase;

	public function test_roleables(): void 
	{
		$role = Role::factory()->create();
		$user = User::factory()->create();
		$group = Group::factory()->create();

		$role->roleables(User::class)->attach($user->id);
		$role->roleables(Group::class)->attach($group->id);

		$this->assertDatabaseCount('roleables', 2);
	}
}
