<?php

namespace Database\Factories;

use App\Models\Role;
use Illuminate\Database\Eloquent\Factories\Factory;

class RoleFactory extends Factory
{
    protected $model = Role::class;

    public function definition(): array
    {
        $name = fake()->name();

        return [
            'name' => ucfirst($name),
            'slug' => str($name)->slug('.')->toString(),
            'description' => '',
            'level' => fake()->numberBetween(0, 10),
        ];
    }
}
