<?php

/**
 * Este archivo es parte de .
 * (c) Johan Alvarez <llstarscreamll@hotmail.com>
 * Licensed under The MIT License (MIT).
 *
 * @package    
 * @version    0.1
 * @author     Johan Alvarez
 * @license    The MIT License (MIT)
 * @copyright  (c) 2015-2016, Johan Alvarez <llstarscreamll@hotmail.com>
 * @link       https://github.com/llstarscreamll
 */

$factory->define(App\Models\Department::class, function (Faker\Generator $faker) {
    $countries = App\Models\Country::all('id')->pluck('id')->toArray();

    return [
        'country_id' => $faker->randomElement($countries),
        'code' => $faker->randomNumber(),
        'name' => $faker->sentence,
    ];
});
