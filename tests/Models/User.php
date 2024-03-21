<?php

namespace Tests\Models;

use Tests\Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Model;

class User extends Model
{
    use HasFactory;
    use HasUuids;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function uniqueIds()
    {
        return [
			'email', 
		];
    }

    protected static function newFactory(): UserFactory
    {
        return UserFactory::new();
    }
}
