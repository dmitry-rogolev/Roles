<?php

namespace dmitryrogolev\Roles\Contracts;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

interface Roleable 
{
	public function roles(): BelongsToMany;

	public function getRoles(): Collection;

	public function loadRoles(): static;

	public function attachRole(...$roles): static;

	public function detachRole(...$roles): static;

	public function detachAllRoles(): static;

	public function syncRoles(...$roles): static;

	public function hasRole(...$roles): bool;
}
