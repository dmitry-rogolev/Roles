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
        $roles = collect([
            Role::factory()->create(['level' => 1]),
            Role::factory()->create(['level' => 2]),
            Role::factory()->create(['level' => 3]),
        ]);
        $user->roles()->attach($roles->last()->id);

        $expected = [$roles->last()->id];
        $actual = $user->getRoles()->pluck('id')->all();
        $this->assertEquals($expected, $actual);
    }

    public function test_attach_role(): void
    {
        $user = User::factory()->create();
        $role = Role::factory()->create();
        $user->attachRole($role);
        $this->assertDatabaseHas('role_user', ['role_id' => $role->id, 'user_id' => $user->id]);
    }

    public function test_detach_role(): void
    {
        $user = User::factory()->create();
        $roles = Role::factory(3)->create();

        $user->attachRole($roles);

        foreach ($roles as $role) {
            $this->assertDatabaseHas('role_user', ['role_id' => $role->id, 'user_id' => $user->id]);
        }

        $user->detachRole($roles);

        foreach ($roles as $role) {
            $this->assertDatabaseMissing('role_user', ['role_id' => $role->id, 'user_id' => $user->id]);
        }
    }

    public function test_detach_all_roles(): void
    {
        $user = User::factory()->create();
        $roles = Role::factory(3)->create();

        $user->attachRole($roles);

        foreach ($roles as $role) {
            $this->assertDatabaseHas('role_user', ['role_id' => $role->id, 'user_id' => $user->id]);
        }

        $user->detachAllRoles();

        foreach ($roles as $role) {
            $this->assertDatabaseMissing('role_user', ['role_id' => $role->id, 'user_id' => $user->id]);
        }
    }

    public function test_sync_roles(): void
    {
        $user = User::factory()->create();
        $roles = Role::factory(3)->create();
        $user->attachRole($roles);
        $sync = Role::factory(3)->create();

        $user->syncRoles($sync);

        foreach ($roles as $role) {
            $this->assertDatabaseMissing('role_user', ['role_id' => $role->id, 'user_id' => $user->id]);
        }
        foreach ($sync as $role) {
            $this->assertDatabaseHas('role_user', ['role_id' => $role->id, 'user_id' => $user->id]);
        }
    }

    public function test_has_role(): void
    {
        $user = User::factory()->create();
        $role = Role::factory()->create();
        $roles = Role::factory(3)->create();
        $user->attachRole($role);
        $user->attachRole($roles);

        $this->assertTrue($user->hasRole($role));
        $this->assertTrue($user->hasRole($roles));
        $this->assertFalse($user->hasRole(Role::factory()->create()));
    }
}
