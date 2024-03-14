<?php

namespace App\Models;

use Database\Factories\RoleFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

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

    /**
     * Роль относится к множеству моделей.
     *
     * @param  string  $related  Имя модели.
     */
    public function roleables(string $related): MorphToMany
    {
        return $this->morphedByMany($related, 'roleable')->withTimestamps();
    }

    protected static function newFactory(): RoleFactory
    {
        return RoleFactory::new();
    }
}
