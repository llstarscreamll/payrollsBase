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
 * Clase UserConceptsTableSeeder
 *
 * @author  Johan Alvarez <llstarscreamll@hotmail.com>
 */
class UserConceptsTableSeeder extends Seeder
{
    public function run()
    {
        $data = array();
        $date = Carbon::now();
        $faker = Faker::create();


        for ($i=0; $i < 10; $i++) { 
            $data[] = [
                'name' => $faker->sentence,
                'type' => $faker->randomElement(['accrual','deduction','not_operate']),
                'is_wage' => $faker->boolean(60),
                'apply_1393_law' => $faker->boolean(60),
                'retention' => $faker->boolean(60),
                'ibc_health' => $faker->boolean(60),
                'ibc_pension' => $faker->boolean(60),
                'ibc_arl' => $faker->boolean(60),
                'ccf_base' => $faker->boolean(60),
                'sena_base' => $faker->boolean(60),
                'icbf_base' => $faker->boolean(60),
                'severance_base' => $faker->boolean(60),
                'premium_base' => $faker->boolean(60),
                'provisioning_holiday' => $faker->boolean(60),
                'money_holiday_base' => $faker->boolean(60),
                'holidays_enjoyed' => $faker->boolean(60),
                'holiday_contract_settlement' => $faker->boolean(60),
                'indemnity' => $faker->boolean(60),
            ];
        }

        \DB::table('user_concepts')->insert($data);
    }
}