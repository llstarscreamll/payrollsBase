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
use Illuminate\Database\Seeder;

/**
 * Clase PayrollTypePermissionsSeeder
 *
 * @author  Johan Alvarez <llstarscreamll@hotmail.com>
 */
class PayrollTypePermissionsSeeder extends Seeder
{
    public function run()
    {
        $date = Carbon::now();
        $data = array();

        $data[] = [
            'slug' => 'payroll-types.index',
            'name' => 'Listar Tipos de planilla',
            'description' => 'Ver en una lista todos los Tipos de planilla del sistema',
            'created_at' => $date->toDateTimeString(),
            'updated_at' => $date->toDateTimeString()
        ];
            
        $data[] = [
            'slug' => 'payroll-types.create',
            'name' => 'Crear Tipo de planilla',
            'description' => 'Crear nuevos Tipos de planilla',
            'created_at' => $date->toDateTimeString(),
            'updated_at' => $date->toDateTimeString()
        ];
            
        $data[] = [
            'slug' => 'payroll-types.show',
            'name' => 'Ver Tipo de planilla',
            'description' => 'Visalizar la información de los Tipos de planilla (sólo lectura)',
            'created_at' => $date->toDateTimeString(),
            'updated_at' => $date->toDateTimeString()
        ];
            
        $data[] = [
            'slug' => 'payroll-types.edit',
            'name' => 'Actualizar Tipo de planilla',
            'description' => 'Actualiza la información de los Tipos de planilla del sistema',
            'created_at' => $date->toDateTimeString(),
            'updated_at' => $date->toDateTimeString()
        ];
        
        $data[] = [
            'slug' => 'payroll-types.destroy',
            'name' => 'Eliminar Tipo de planilla',
            'description' => 'Eliminar Tipos de planilla del sistema',
            'created_at' => $date->toDateTimeString(),
            'updated_at' => $date->toDateTimeString()
        ];


        \DB::table('permissions')->insert($data);

        $this->call(AttachPermissionsToAdminRoleSeeder::class);
    }
}