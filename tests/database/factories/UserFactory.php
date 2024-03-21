<?php

namespace Tests\Database\Factories;

use Tests\Models\User;
use Orchestra\Testbench\Factories\UserFactory as TestbenchUserFactory;

class UserFactory extends TestbenchUserFactory
{
    protected $model = User::class;
}
