<?php

use Carbon\Carbon;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $data = array();
        $date = Carbon::now();
        $faker = Faker::create();

        for ($i=0; $i < 10; $i++) { 
            $data[] = [
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => bcrypt('123456789'),
                'created_at' => $date->toDateTimeString(),
                'updated_at' => $date->toDateTimeString()
            ];
        }

        \DB::table('users')->insert($data);
    }
}