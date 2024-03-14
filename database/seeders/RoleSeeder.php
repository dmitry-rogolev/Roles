<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        foreach ($this->getRoles() as $role) {
            if (! Role::where('slug', $role['slug'])->first()) {
                Role::create($role);
            }
        }
    }

    public function getRoles(): array
    {
        return [
            ['name' => 'Admin', 'slug' => 'admin', 'description' => '', 'level' => 5],
            ['name' => 'User', 'slug' => 'user', 'description' => '', 'level' => 1],
            ['name' => 'Unverified', 'slug' => 'unverified', 'description' => '', 'level' => 0],
        ];
    }
}
