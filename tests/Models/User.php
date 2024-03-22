<?php

namespace Tests\Models;

use dmitryrogolev\Roles\Contracts\Roleable;
use dmitryrogolev\Roles\Traits\HasRoles;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Model;
use Tests\Database\Factories\UserFactory;

class User extends Model implements Roleable
{
    use HasFactory;
    use HasUuids;
    use HasRoles;

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
            $this->getKeyName(),
            'email',
        ];
    }

    protected static function newFactory(): UserFactory
    {
        return UserFactory::new();
    }
}
