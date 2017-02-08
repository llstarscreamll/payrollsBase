<?php

use Illuminate\Database\Seeder;

class RealContributorClassesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $date = date('Y-m-d H:i:s');

        $data = [
            [
                'name' => 'Aportante con 200 o más cotizantes',
                'short_name' => 'A',
                // 'created_at' => $date,
                // 'updated_at' => $date,
            ],
            [
                'name' => 'Aportante con menos de 200 cotizantes',
                'short_name' => 'B',
                // 'created_at' => $date,
                // 'updated_at' => $date,
            ],
            [
                'name' => 'Aportante MiPyme que se acoge a ley 590 de 2000',
                'short_name' => 'C',
                // 'created_at' => $date,
                // 'updated_at' => $date,
            ],
            [
                'name' => 'Aportante benefiricario del art 5 de ley 1429 de 2010',
                'short_name' => 'D',
                // 'created_at' => $date,
                // 'updated_at' => $date,
            ],
            [
                'name' => 'Independiente',
                'short_name' => 'I',
                // 'created_at' => $date,
                // 'updated_at' => $date,
            ],
        ];

        DB::table('contributor_classes')->insert($data);
    }
}
