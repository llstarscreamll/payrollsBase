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

use Carbon\Carbon;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

/**
 * Clase IdentityCardTypesTableSeeder
 *
 * @author  Johan Alvarez <llstarscreamll@hotmail.com>
 */
class IdentityCardTypesTableSeeder extends Seeder
{
    public function run()
    {
        $data = array();
        $date = Carbon::now();
        $faker = Faker::create();


        for ($i=0; $i < 10; $i++) { 
            $data[] = [
                'name' => $faker->sentence,
                'short_name' => $faker->sentence,
            ];
        }

        \DB::table('identity_card_types')->insert($data);
    }
}