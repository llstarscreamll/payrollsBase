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

use Carbon\Carbon;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

/**
 * Clase DepartmentsTableSeeder
 *
 * @author  Johan Alvarez <llstarscreamll@hotmail.com>
 */
class DepartmentsTableSeeder extends Seeder
{
    public function run()
    {
        $data = array();
        $date = Carbon::now();
        $faker = Faker::create();

        $countries = App\Models\Country::all('id')->pluck('id')->toArray();

        for ($i=0; $i < 10; $i++) { 
            $data[] = [
                'country_id' => $faker->randomElement($countries),
                'code' => $faker->randomNumber(),
                'name' => $faker->sentence,
            ];
        }

        \DB::table('departments')->insert($data);
    }
}