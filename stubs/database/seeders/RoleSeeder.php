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
            ['name' => 'Администратор', 'slug' => 'admin', 'description' => ''],
            ['name' => 'Пользователь', 'slug' => 'user', 'description' => ''],
            ['name' => 'Гость', 'slug' => 'visitor', 'description' => ''],
        ];
    }
}
