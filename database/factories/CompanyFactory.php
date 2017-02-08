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

$factory->define(App\Models\Company::class, function (Faker\Generator $faker) {
    $identityCardTypes = App\Models\IdentityCardType::all('id')->pluck('id')->toArray();
    $legalCompanyNatures = App\Models\LegalCompanyNature::all('id')->pluck('id')->toArray();
    $municipalities = App\Models\Municipality::all('id')->pluck('id')->toArray();
    $identityCardTypes = App\Models\IdentityCardType::all('id')->pluck('id')->toArray();
    $contributorClasses = App\Models\ContributorClass::all('id')->pluck('id')->toArray();
    $contributorTypes = App\Models\ContributorType::all('id')->pluck('id')->toArray();
    $payrollTypes = App\Models\PayrollType::all('id')->pluck('id')->toArray();
    $arlCompanies = App\Models\ArlCompany::all('id')->pluck('id')->toArray();
    $departments = App\Models\Department::all('id')->pluck('id')->toArray();
    $banks = App\Models\Bank::all('id')->pluck('id')->toArray();
    $pilaPaymentOperators = App\Models\PilaPaymentOperator::all('id')->pluck('id')->toArray();

    return [
        'name' => $faker->sentence,
        'identity_card_type_id' => $faker->randomElement($identityCardTypes),
        'contributor_identity_card_number' => $faker->randomNumber(),
        'verification_digit' => $faker->randomNumber(),
        'legal_company_nature_id' => $faker->randomElement($legalCompanyNatures),
        'person_type' => $faker->sentence,
        'address' => $faker->sentence,
        'municipality_id' => $faker->randomElement($municipalities),
        'dane_activity_code' => $faker->sentence,
        'phone' => $faker->sentence,
        'fax' => $faker->sentence,
        'email' => $faker->sentence,
        'legal_rep_identity_card_type_id' => $faker->randomElement($identityCardTypes),
        'legal_rep_identity_card_number' => $faker->randomNumber(),
        'legal_rep_verification_digit' => $faker->randomNumber(),
        'legal_rep_first_name' => $faker->sentence,
        'legal_rep_middle_name' => $faker->sentence,
        'legal_rep_first_surname' => $faker->sentence,
        'legal_rep_last_surname' => $faker->sentence,
        'legal_rep_email' => $faker->sentence,
        'contact_first_name' => $faker->sentence,
        'contact_last_name' => $faker->sentence,
        'contact_cell_phone' => $faker->sentence,
        'contact_email' => $faker->sentence,
        'contributor_class_id' => $faker->randomElement($contributorClasses),
        'presentation_form' => $faker->sentence,
        'contributor_type_id' => $faker->randomElement($contributorTypes),
        'payroll_type_id' => $faker->randomElement($payrollTypes),
        'arl_company_id' => $faker->randomElement($arlCompanies),
        'arl_department_id' => $faker->randomElement($departments),
        'law_1429_from_2010' => $faker->boolean(60),
        'law_1607_from_2012' => $faker->boolean(60),
        'commercial_registration_date' => $faker->date('Y-m-d'),
        'payment_method' => $faker->sentence,
        'bank_id' => $faker->randomElement($banks),
        'bank_account_type' => $faker->sentence,
        'bank_account_number' => $faker->sentence,
        'payment_frequency' => $faker->sentence,
        'pila_payment_operator_id' => $faker->randomElement($pilaPaymentOperators),
    ];
});
