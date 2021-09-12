<?php

namespace Aries\LaravelRbac\Database\Factories;

use Aries\LaravelRbac\Models\Role;
use Illuminate\Database\Eloquent\Factories\Factory;

class RoleFactory extends Factory {

    protected $model = Role::class;

    public function definition() {
        return [
            'name'  =>  $this->faker->text,
            'label' =>  $this->faker->text
        ];
    }
}