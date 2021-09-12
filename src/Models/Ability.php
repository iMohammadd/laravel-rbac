<?php

namespace Aries\LaravelRbac\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ability extends Model {
    use HasFactory;

    protected $fillable = [
        'name',
        'label'
    ];

    public function roles()  {
        return $this->belongsToMany(Role::class);
    }

    protected static function newFactory() {
        return \Aries\LaravelRbac\Database\Factories\AbilityFactory::new();
    }
}