<?php

namespace dmitryrogolev\Roles\Contracts;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;

interface RoleHasRelations
{
	public function users(): BelongsToMany;
}
