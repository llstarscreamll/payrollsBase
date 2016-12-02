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

$factory->define(App\Models\Company::class, function (Faker\Generator $faker) {
    $identityCardTypes = App\Models\IdentityCardType::all('id')->pluck('id')->toArray();
    $companyTaxpayerTypes = App\Models\CompanyTaxpayerType::all('id')->pluck('id')->toArray();
    $legalCompanyNatures = App\Models\LegalCompanyNature::all('id')->pluck('id')->toArray();
    $legalPersonNatures = App\Models\LegalPersonNature::all('id')->pluck('id')->toArray();
    $municipalities = App\Models\Municipality::all('id')->pluck('id')->toArray();

    return [
        'name' => $faker->sentence,
        'identity_card_type_id' => $faker->randomElement($identityCardTypes),
        'contributor_identity_card_number' => $faker->randomNumber(),
        'verification_digit' => $faker->randomNumber(),
        'company_taxpayer_type_id' => $faker->randomElement($companyTaxpayerTypes),
        'legal_company_nature_id' => $faker->randomElement($legalCompanyNatures),
        'legal_person_nature_id' => $faker->randomElement($legalPersonNatures),
        'has_branches' => $faker->boolean(60),
        'applay_1607_law' => $faker->boolean(60),
        'applay_1429_law' => $faker->boolean(60),
        'founded_at' => $faker->date('Y-m-d'),
        'address' => $faker->sentence,
        'municipality_id' => $faker->randomElement($municipalities),
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
    ];
});
