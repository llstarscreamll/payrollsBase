<?php

use Illuminate\Database\Seeder;

class RealEmployeeTaxpayerTypesTableSeeder extends Seeder
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
            ['name' => 'Trabajador dependiente', 'created_at' => $date, 'updated_at' => $date],
            ['name' => 'Estudiantes', 'created_at' => $date, 'updated_at' => $date],
            ['name' => 'Aprendices del SENA en etapa lectiva', 'created_at' => $date, 'updated_at' => $date],
            ['name' => 'Aprendices del SENA en etapa productiva', 'created_at' => $date, 'updated_at' => $date],
            ['name' => 'Estudiante universitario practicas', 'created_at' => $date, 'updated_at' => $date],
            ['name' => 'Independiente', 'created_at' => $date, 'updated_at' => $date],
        ];

        DB::table('employee_taxpayer_types')->insert($data);
    }
}
