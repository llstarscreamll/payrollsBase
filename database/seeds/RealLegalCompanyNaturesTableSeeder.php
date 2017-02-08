<?php

use Illuminate\Database\Seeder;

class RealLegalCompanyNaturesTableSeeder extends Seeder
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
                'name' => 'Pública',
                'short_name' => '1',
                // 'created_at' => $date,
                // 'updated_at' => $date
            ],[
                'name' => 'Privada',
                'short_name' => '2',
                // 'created_at' => $date,
                // 'updated_at' => $date
            ],[
                'name' => 'Mixta',
                'short_name' => '3',
                // 'created_at' => $date,
                // 'updated_at' => $date
            ],[
                'name' => 'Organismos multilaterales ',
                'short_name' => '4',
                // 'created_at' => $date,
                // 'updated_at' => $date
            ],[
                'name' => 'Entidades de derecho publico no sometidas a la legislacion colombiana',
                'short_name' => '5',
                // 'created_at' => $date,
                // 'updated_at' => $date
            ]
        ];

        DB::table('legal_company_natures')->insert($data);
    }
}
