<?php

namespace Tests\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Tests\Database\Factories\GroupFactory;

class Group extends Model
{
	use HasUuids;
	use HasFactory;

	protected $fillable = [
		'name', 
	];

	protected static function newFactory(): GroupFactory
	{
		return new GroupFactory;
	}
}
