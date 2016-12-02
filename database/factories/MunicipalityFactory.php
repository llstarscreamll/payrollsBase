<?php

/**
 * Este archivo es parte de Payrolls.
 * (c) Johan Alvarez <llstarscreamll@hotmail.com>
 * Licensed under The MIT License (MIT).
 *
 * @package    Payrolls
 * @version    0.1
 * @author     Johan Alvarez
 * @license    The MIT License (MIT)
 * @copyright  (c) 2015-2016, Johan Alvarez <llstarscreamll@hotmail.com>
 * @link       https://github.com/llstarscreamll
 */

$factory->define(App\Models\Municipality::class, function (Faker\Generator $faker) {
    $departments = App\Models\Department::all('id')->pluck('id')->toArray();

    return [
        'department_id' => $faker->randomElement($departments),
        'code' => $faker->randomNumber(),
        'name' => $faker->sentence,
    ];
});
