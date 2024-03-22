<?php

namespace Tests\Database\Factories;

use Orchestra\Testbench\Factories\UserFactory as TestbenchUserFactory;
use Tests\Models\User;

class UserFactory extends TestbenchUserFactory
{
    protected $model = User::class;
}
