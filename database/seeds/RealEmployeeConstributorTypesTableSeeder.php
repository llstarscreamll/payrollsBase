<?php

use Illuminate\Database\Seeder;

class RealEmployeeConstributorTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $date = date('Y-m-d H:i:s');

        $data = [
            [
                'name' => 'Trabajador dependiente',
                'short_name' => 'TD',
                // 'created_at' => $date,
                // 'updated_at' => $date
            ],
            [
                'name' => 'Estudiantes',
                'short_name' => 'E',
                // 'created_at' => $date,
                // 'updated_at' => $date
            ],
            [
                'name' => 'Aprendices del SENA en etapa lectiva',
                'short_name' => 'SENA-L',
                // 'created_at' => $date,
                // 'updated_at' => $date
            ],
            [
                'name' => 'Aprendices del SENA en etapa productiva',
                'short_name' => 'SENA-P',
                // 'created_at' => $date,
                // 'updated_at' => $date
            ],
            [
                'name' => 'Estudiante universitario practicas',
                'short_name' => 'UP',
                // 'created_at' => $date,
                // 'updated_at' => $date
            ],
            [
                'name' => 'Independiente',
                'short_name' => 'I',
                // 'created_at' => $date,
                // 'updated_at' => $date
            ],
        ];

        DB::table('employee_contributor_types')->insert($data);
    }
}
