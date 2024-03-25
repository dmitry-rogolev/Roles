<?php

namespace dmitryrogolev\Roles\Traits;

use App\Models\Role;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Arr;

trait HasRoles
{
	public function roles(): BelongsToMany
	{
		return $this->belongsToMany(Role::class)->withTimestamps();
	}

	public function getRoles(): Collection
	{
		return $this->roles;
	}

	public function loadRoles(): static 
	{
		return $this->load('roles');
	}

	public function attachRole(...$roles): static 
	{
		$roles = Arr::flatten($roles);

		foreach ($roles as $role) {
			$this->roles()->attach($role);
		}

		return $this;
	}

	public function detachRole(...$roles): static
	{
		$roles = Arr::flatten($roles);

		foreach ($roles as $role) {
			$this->roles()->detach($role);
		}

		return $this;
	}

	public function detachAllRoles(): static
	{
		$this->roles()->detach();

		return $this;
	}

	public function syncRoles(...$roles): static
	{
		$this->detachAllRoles();
		$this->attachRole(...$roles);

		return $this;
	}

	public function hasRole(...$roles): bool 
	{
		$roles = Arr::flatten($roles);

		foreach ($roles as $role) {
			if (! $this->roles->contains(fn ($item) => $item->is($role))) {
				return false;
			}
		}

		return true;
	}
}
