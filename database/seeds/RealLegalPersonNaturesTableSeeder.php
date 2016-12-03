<?php

use Illuminate\Database\Seeder;

class RealLegalPersonNaturesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $date = date('Y-m-d H:i:s');

        $data = [
            [
                'short_name' => 'N',
                'name' => 'Natural' ,
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'short_name' => 'J',
                'name' => 'Juridica',
                'created_at' => $date,
                'updated_at' => $date
            ],
        ];

        DB::table('legal_person_natures')->insert($data);
    }
}
