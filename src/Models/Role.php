<?php

namespace Aries\LaravelRbac\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model {
    use HasFactory;

    protected $fillable = [
        'name',
        'label'
    ];

    public function abilities() {
        return $this->belongsToMany(Ability::class);
    }

    protected static function newFactory() {
        return \Aries\LaravelRbac\Database\Factories\RoleFactory::new();
    }
}