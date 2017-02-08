<?php

use Illuminate\Database\Seeder;

class RealPayrollTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $date = date('Y-m-d H:i:s');

        $data = [
            [
                'name' => 'Planilla Empleados Empresas',
                'short_name' => 'E',
                // 'created_at' => $date,
                // 'updated_at' => $date,
            ],
            [
                'name' => 'Planilla Independientes Empresas',
                'short_name' => 'Y',
                // 'created_at' => $date,
                // 'updated_at' => $date,
            ],
            [
                'name' => 'Planilla Empleados Adicionales',
                'short_name' => 'A',
                // 'created_at' => $date,
                // 'updated_at' => $date,
            ],
            [
                'name' => 'Planilla Independientes',
                'short_name' => 'I',
                // 'created_at' => $date,
                // 'updated_at' => $date,
            ],
            [
                'name' => 'Planilla Empleados Independientes',
                'short_name' => 'S',
                // 'created_at' => $date,
                // 'updated_at' => $date,
            ],
            [
                'name' => 'Planilla Mora',
                'short_name' => 'M',
                // 'created_at' => $date,
                // 'updated_at' => $date,
            ],
            [
                'name' => 'Planilla Correcciones',
                'short_name' => 'N',
                // 'created_at' => $date,
                // 'updated_at' => $date,
            ],
            [
                'name' => 'Planilla Madres Comunitarias',
                'short_name' => 'H',
                // 'created_at' => $date,
                // 'updated_at' => $date,
            ],
            [
                'name' => 'Trabajadores oficiales y empleados publicos que se dediquen a la prestación del servicio de salud',
                'short_name' => 'T',
                // 'created_at' => $date,
                // 'updated_at' => $date,
            ],
            [
                'name' => 'Sentencia Judicial',
                'short_name' => 'J',
                // 'created_at' => $date,
                // 'updated_at' => $date,
            ],
        ];

        DB::table('payroll_types')->insert($data);
    }
}
