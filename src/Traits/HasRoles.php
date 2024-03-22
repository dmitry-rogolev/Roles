<?php

namespace dmitryrogolev\Roles\Traits;

use App\Models\Role;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

trait HasRoles
{
	public function roles(): BelongsToMany
	{
		return $this->belongsToMany(Role::class)->withTimestamps();
	}

	/**
	 * Возвращает все присоединенные роли.
	 */
	public function getRoles(): Collection
	{
		return Role::where('level', '<=', $this->getLevel())->get();
	}

	/**
	 * Возвращает роль с наибольшим уровнем.
	 */
	public function getRole(): ?Role
	{
		return $this->roles->sortByDesc('level')->first();
	}

	/**
	 * Возвращает наибольший уровень присоединенных ролей.
	 */
	public function getLevel(): int
	{
		return $this->getRole()?->level ?? 0;
	}

	public function loadRoles(): static 
	{
		return $this->load('roles');
	}

	
}
