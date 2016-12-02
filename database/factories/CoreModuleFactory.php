<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

use llstarscreamll\Core\Models\Role;
use llstarscreamll\Core\Models\User;
use llstarscreamll\Core\Models\Permission;

$factory->define(User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(Role::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->sentence,
        'slug' => $faker->slug,
        'description' => $faker->text,
        'level' => $faker->numberBetween(1, 10),
    ];
});

$factory->define(Permission::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->sentence,
        'slug' => $faker->slug,
        'description' => $faker->text,
        'model' => null,
    ];
});
