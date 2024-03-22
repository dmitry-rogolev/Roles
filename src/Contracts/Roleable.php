<?php

namespace dmitryrogolev\Roles\Contracts;

use App\Models\Role;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

interface Roleable 
{
	public function roles(): BelongsToMany;

	/**
	 * Возвращает все присоединенные роли.
	 */
	public function getRoles(): Collection;

	/**
	 * Возвращает роль с наибольшим уровнем из всех присоединенных ролей.
	 */
	public function getRole(): ?Role;

	/**
	 * Возвращает наибольший уровень присоединенных ролей.
	 */
	public function getLevel(): int;

	public function loadRoles(): static;
}
