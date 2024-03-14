<?php

namespace dmitryrogolev\Roles\Traits;

use App\Models\Role;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

trait HasRoles 
{
	/**
     * Модель относится к множеству ролей.
     */
    public function roles(): MorphToMany
    {
        return $this->morphToMany(Role::class, 'roleable')->withTimestamps();
    }
}
