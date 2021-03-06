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
 * @copyright  (c) 2015-2017, Johan Alvarez <llstarscreamll@hotmail.com>
 * @link       https://github.com/llstarscreamll
 */

$factory->define(App\Models\BranchOffice::class, function (Faker\Generator $faker) {
    $companies = App\Models\Company::all('id')->pluck('id')->toArray();

    return [
        'company_id' => $faker->randomElement($companies),
        'name' => $faker->sentence,
    ];
});
