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
use Illuminate\Database\Seeder;

/**
 * Clase EmployeeTaxpayerTypePermissionsSeeder
 *
 * @author  Johan Alvarez <llstarscreamll@hotmail.com>
 */
class EmployeeTaxpayerTypePermissionsSeeder extends Seeder
{
    public function run()
    {
        $date = Carbon::now();
        $data = array();

        $data[] = [
            'slug' => 'employee-taxpayer-types.index',
            'name' => 'Listar Tipos de Cotizante',
            'description' => 'Ver en una lista todos los Tipos de Cotizante del sistema',
            'created_at' => $date->toDateTimeString(),
            'updated_at' => $date->toDateTimeString()
        ];
            
        $data[] = [
            'slug' => 'employee-taxpayer-types.create',
            'name' => 'Crear Tipo de Cotizante',
            'description' => 'Crear nuevos Tipos de Cotizante',
            'created_at' => $date->toDateTimeString(),
            'updated_at' => $date->toDateTimeString()
        ];
            
        $data[] = [
            'slug' => 'employee-taxpayer-types.show',
            'name' => 'Ver Tipo de Cotizante',
            'description' => 'Visalizar la información de los Tipos de Cotizante (sólo lectura)',
            'created_at' => $date->toDateTimeString(),
            'updated_at' => $date->toDateTimeString()
        ];
            
        $data[] = [
            'slug' => 'employee-taxpayer-types.edit',
            'name' => 'Actualizar Tipo de Cotizante',
            'description' => 'Actualiza la información de los Tipos de Cotizante del sistema',
            'created_at' => $date->toDateTimeString(),
            'updated_at' => $date->toDateTimeString()
        ];
        
        $data[] = [
            'slug' => 'employee-taxpayer-types.destroy',
            'name' => 'Eliminar Tipo de Cotizante',
            'description' => 'Eliminar Tipos de Cotizante del sistema',
            'created_at' => $date->toDateTimeString(),
            'updated_at' => $date->toDateTimeString()
        ];


        \DB::table('permissions')->insert($data);
    }
}