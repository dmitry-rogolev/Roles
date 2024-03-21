<?php

namespace dmitryrogolev\Roles\Models;

use dmitryrogolev\Roles\Database\Factories\RoleFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
	use HasFactory;
	use HasUuids;

	protected $fillable = [
		'name', 
		'slug', 
		'description', 
		'level', 
	];

	public function uniqueIds()
    {
        return [
			'slug', 
		];
    }

	protected static function newFactory(): RoleFactory
	{
		return new RoleFactory;
	}
}
