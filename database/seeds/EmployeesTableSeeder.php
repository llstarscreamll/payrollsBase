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

use Carbon\Carbon;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

/**
 * Clase EmployeesTableSeeder
 *
 * @author  Johan Alvarez <llstarscreamll@hotmail.com>
 */
class EmployeesTableSeeder extends Seeder
{
    public function run()
    {
        $data = array();
        $date = Carbon::now();
        $faker = Faker::create();

        $branches = App\Models\Branch::all('id')->pluck('id')->toArray();
        $employeeTaxpayerTypes = App\Models\EmployeeTaxpayerType::all('id')->pluck('id')->toArray();

        for ($i=0; $i < 10; $i++) { 
            $data[] = [
                'dni' => $faker->randomNumber(),
                'name' => $faker->sentence,
                'lastname' => $faker->sentence,
                'branch_id' => $faker->randomElement($branches),
                'contract_type' => $faker->randomElement(['I','F','L']),
                'salary' => $faker->randomNumber(),
                'salary_type' => $faker->randomElement(['I','O1','O2']),
                'occupational_risk_level' => $faker->randomElement(['I','II','III','IV','V']),
                'employee_taxpayer_type_id' => $faker->randomElement($employeeTaxpayerTypes),
                'dependents_deduction' => $faker->randomNumber(),
                'average_EPS_contributions_last_year' => $faker->randomNumber(),
                'home_interest_deduction_last_year' => $faker->randomNumber(),
                'prepaid_medicine' => $faker->randomNumber(),
                'applay_2090_decree' => $faker->boolean(60),
                'contributor_subtype' => $faker->boolean(60),
                'admitted_at' => $date->toDateString(),
                'egressed_at' => $date->toDateString(),
                'created_at' => $date->toDateTimeString(),
                'updated_at' => $date->toDateTimeString(),
            ];
        }

        \DB::table('employees')->insert($data);
    }
}