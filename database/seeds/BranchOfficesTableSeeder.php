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
 * Clase BranchOfficesTableSeeder
 *
 * @author  Johan Alvarez <llstarscreamll@hotmail.com>
 */
class BranchOfficesTableSeeder extends Seeder
{
    public function run()
    {
        $data = array();
        $date = Carbon::now();
        $faker = Faker::create();

        $companies = App\Models\Company::all('id')->pluck('id')->toArray();

        for ($i=0; $i < 10; $i++) { 
            $data[] = [
                'company_id' => $faker->randomElement($companies),
                'name' => $faker->sentence,
            ];
        }

        \DB::table('branch_offices')->insert($data);
    }
}