<?php

namespace Tests\Feature\Src\Traits;

use App\Models\Role;
use Tests\Models\User;
use Tests\RefreshDatabase;
use Tests\TestCase;

class HasRolesTest extends TestCase
{
	use RefreshDatabase;

	public function test_get_roles(): void 
	{
		$user = User::factory()->create();
		Role::factory()->create(['level' => 10]);
		$roles = collect([
			Role::factory()->create(['level' => 1]), 
			Role::factory()->create(['level' => 2]), 
			Role::factory()->create(['level' => 3]), 
		]);
		$user->roles()->attach($roles->last()->id);

		$expected = $roles->pluck('id')->all();
		$actual = $user->getRoles()->pluck('id')->all();
		$this->assertEquals($expected, $actual);
	}

	public function test_get_role(): void 
	{
		// $user = User::factory()->create();
		// $user->roles()->attach(Role::factory()->create(['level' => 1]));
		// $user->roles()->attach(Role::factory()->create(['level' => 2]));
		// $expected = Role::factory()->create(['level' => 3]);
		// $user->roles()->attach($expected);

		// $actual = $user->getRole();
		// $this->assertTrue($expected->is($actual));
	}
}
