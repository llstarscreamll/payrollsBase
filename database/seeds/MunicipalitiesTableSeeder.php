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
 * Clase MunicipalitiesTableSeeder
 *
 * @author  Johan Alvarez <llstarscreamll@hotmail.com>
 */
class MunicipalitiesTableSeeder extends Seeder
{
    public function run()
    {
        $data = array();
        $date = Carbon::now();
        $faker = Faker::create();

        $departments = App\Models\Department::all('id')->pluck('id')->toArray();

        for ($i=0; $i < 10; $i++) { 
            $data[] = [
                'department_id' => $faker->randomElement($departments),
                'code' => $faker->randomNumber(),
                'name' => $faker->sentence,
            ];
        }

        \DB::table('municipalities')->insert($data);
    }
}