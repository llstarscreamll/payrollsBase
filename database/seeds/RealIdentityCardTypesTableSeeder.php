<?php

use Illuminate\Database\Seeder;

class RealIdentityCardTypesTableSeeder extends Seeder
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
                'short_name' => 'NI',
                'name' => 'Numero de identificación tributaria',
                // 'created_at' => $date,
                // 'updated_at' => $date,
            ],
            [
                'short_name' => 'CC',
                'name' => 'Cédula de ciudadania',
                // 'created_at' => $date,
                // 'updated_at' => $date,
            ],
            [
                'short_name' => 'CE',
                'name' => 'Cédula de extranjeria',
                // 'created_at' => $date,
                // 'updated_at' => $date,
            ],
            [
                'short_name' => 'TI',
                'name' => 'Tarjeta de identidad',
                // 'created_at' => $date,
                // 'updated_at' => $date,
            ],
            [
                'short_name' => 'PA',
                'name' => 'Pasaporte',
                // 'created_at' => $date,
                // 'updated_at' => $date,
            ],
            [
                'short_name' => 'CD',
                'name' => 'Carne Diplomatico',
                // 'created_at' => $date,
                // 'updated_at' => $date,
            ],
            [
                'short_name' => 'SC',
                'name' => 'Salvoconducto de permanencia',
                // 'created_at' => $date,
                // 'updated_at' => $date,
            ],
        ];

        DB::table('identity_card_types')->insert($data);
    }
}
