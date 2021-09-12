<?php

namespace Aries\LaravelRbac\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable {

    public function roles() {
        return $this->belongsToMany(Role::class);
    }

    public function hasRole($role) {
        return in_array($role, $this->roles->pluck('name')->toArray());
    }

    public function hasAbility($ability) {
        foreach($this->roles as $role) {
            return in_array($ability, $role->abilities->pluck('name')->toArray());
        }
    }
}