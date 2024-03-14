<?php

namespace Database\Factories;

use App\Models\Role;
use Illuminate\Database\Eloquent\Factories\Factory;

class RoleFactory extends Factory
{
    protected $model = Role::class;

    public function definition(): array
    {
        $roles = $this->getRoles();

        return $roles[array_rand($roles)];
    }

    protected function getRoles(): array
    {
        return [
            ['name' => 'Супер', 'slug' => 'super', 'description' => '', 'level' => 10],

            ['name' => 'Администратор', 'slug' => 'admin', 'description' => '', 'level' => 5],

            ['name' => 'Редактор', 'slug' => 'editor', 'description' => '', 'level' => 4],

            ['name' => 'Модератор', 'slug' => 'moderator', 'description' => '', 'level' => 3],
            ['name' => 'Менеджер', 'slug' => 'manager', 'description' => '', 'level' => 3],
            ['name' => 'Разработчик', 'slug' => 'developer', 'description' => '', 'level' => 3],

            ['name' => 'Автор', 'slug' => 'author', 'description' => '', 'level' => 2],

            ['name' => 'Клиент', 'slug' => 'customer', 'description' => '', 'level' => 1],
            ['name' => 'Работник', 'slug' => 'worker', 'description' => '', 'level' => 1],
            ['name' => 'Зритель', 'slug' => 'viewer', 'description' => '', 'level' => 1],
            ['name' => 'Слушатель', 'slug' => 'listener', 'description' => '', 'level' => 1],
            ['name' => 'Пользователь', 'slug' => 'user', 'description' => '', 'level' => 1],

            ['name' => 'Издатель', 'slug' => 'publisher', 'description' => '', 'level' => 3],
            ['name' => 'Писатель', 'slug' => 'writer', 'description' => '', 'level' => 2],
            ['name' => 'Читатель', 'slug' => 'reader', 'description' => '', 'level' => 1],

            ['name' => 'Работодатель', 'slug' => 'employer', 'description' => '', 'level' => 3],
            ['name' => 'Руководитель', 'slug' => 'director', 'description' => '', 'level' => 2],
            ['name' => 'Сотрудник', 'slug' => 'employee', 'description' => '', 'level' => 1],

            ['name' => 'Арендодатель', 'slug' => 'landlord', 'description' => '', 'level' => 2],
            ['name' => 'Арендатор', 'slug' => 'tenant', 'description' => '', 'level' => 1],

            ['name' => 'Продавец', 'slug' => 'seller', 'description' => '', 'level' => 2],
            ['name' => 'Покупатель', 'slug' => 'buyer', 'description' => '', 'level' => 1],

            ['name' => 'Тренер', 'slug' => 'coach', 'description' => '', 'level' => 2],
            ['name' => 'Спортсмен', 'slug' => 'sportsman', 'description' => '', 'level' => 1],

            ['name' => 'Учитель', 'slug' => 'teacher', 'description' => '', 'level' => 2],
            ['name' => 'Ученик', 'slug' => 'student', 'description' => '', 'level' => 1],

            ['name' => 'Гость', 'slug' => 'guest', 'description' => '', 'level' => 0],
            ['name' => 'Посетитель', 'slug' => 'visitor', 'description' => '', 'level' => 0],
            ['name' => 'Непроверенный', 'slug' => 'unverified', 'description' => '', 'level' => 0],
        ];
    }
}
