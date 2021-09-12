<?php

namespace Aries\LaravelRbac\Database\Factories;

use Aries\LaravelRbac\Models\Ability;
use Illuminate\Database\Eloquent\Factories\Factory;

class AbilityFactory extends Factory {

    protected $model = Ability::class;

    public function definition() {
        return [
            'name'  =>  $this->faker->text,
            'label' =>  $this->faker->text
        ];
    }
}