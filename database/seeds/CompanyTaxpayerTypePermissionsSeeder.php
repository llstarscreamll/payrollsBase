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
 * Clase CompanyTaxpayerTypePermissionsSeeder
 *
 * @author  Johan Alvarez <llstarscreamll@hotmail.com>
 */
class CompanyTaxpayerTypePermissionsSeeder extends Seeder
{
    public function run()
    {
        $date = Carbon::now();
        $data = array();

        $data[] = [
            'slug' => 'company-taxpayer-types.index',
            'name' => 'Listar Tipos de Aportantes',
            'description' => 'Ver en una lista todos los Tipos de Aportantes del sistema',
            'created_at' => $date->toDateTimeString(),
            'updated_at' => $date->toDateTimeString()
        ];
            
        $data[] = [
            'slug' => 'company-taxpayer-types.create',
            'name' => 'Crear Tipo de Aportante',
            'description' => 'Crear nuevos Tipos de Aportantes',
            'created_at' => $date->toDateTimeString(),
            'updated_at' => $date->toDateTimeString()
        ];
            
        $data[] = [
            'slug' => 'company-taxpayer-types.show',
            'name' => 'Ver Tipo de Aportante',
            'description' => 'Visalizar la información de los Tipos de Aportantes (sólo lectura)',
            'created_at' => $date->toDateTimeString(),
            'updated_at' => $date->toDateTimeString()
        ];
            
        $data[] = [
            'slug' => 'company-taxpayer-types.edit',
            'name' => 'Actualizar Tipo de Aportante',
            'description' => 'Actualiza la información de los Tipos de Aportantes del sistema',
            'created_at' => $date->toDateTimeString(),
            'updated_at' => $date->toDateTimeString()
        ];
        
        $data[] = [
            'slug' => 'company-taxpayer-types.destroy',
            'name' => 'Eliminar Tipo de Aportante',
            'description' => 'Eliminar Tipos de Aportantes del sistema',
            'created_at' => $date->toDateTimeString(),
            'updated_at' => $date->toDateTimeString()
        ];


        \DB::table('permissions')->insert($data);
    }
}