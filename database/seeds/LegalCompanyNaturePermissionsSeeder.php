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
 * Clase LegalCompanyNaturePermissionsSeeder
 *
 * @author  Johan Alvarez <llstarscreamll@hotmail.com>
 */
class LegalCompanyNaturePermissionsSeeder extends Seeder
{
    public function run()
    {
        $date = Carbon::now();
        $data = array();

        $data[] = [
            'slug' => 'legal-company-natures.index',
            'name' => 'Listar Naturalezas Jurídicas',
            'description' => 'Ver en una lista todos los Naturalezas Jurídicas del sistema',
            'created_at' => $date->toDateTimeString(),
            'updated_at' => $date->toDateTimeString()
        ];
            
        $data[] = [
            'slug' => 'legal-company-natures.create',
            'name' => 'Crear Naturaleza Jurídica',
            'description' => 'Crear nuevos Naturalezas Jurídicas',
            'created_at' => $date->toDateTimeString(),
            'updated_at' => $date->toDateTimeString()
        ];
            
        $data[] = [
            'slug' => 'legal-company-natures.show',
            'name' => 'Ver Naturaleza Jurídica',
            'description' => 'Visalizar la información de los Naturalezas Jurídicas (sólo lectura)',
            'created_at' => $date->toDateTimeString(),
            'updated_at' => $date->toDateTimeString()
        ];
            
        $data[] = [
            'slug' => 'legal-company-natures.edit',
            'name' => 'Actualizar Naturaleza Jurídica',
            'description' => 'Actualiza la información de los Naturalezas Jurídicas del sistema',
            'created_at' => $date->toDateTimeString(),
            'updated_at' => $date->toDateTimeString()
        ];
        
        $data[] = [
            'slug' => 'legal-company-natures.destroy',
            'name' => 'Eliminar Naturaleza Jurídica',
            'description' => 'Eliminar Naturalezas Jurídicas del sistema',
            'created_at' => $date->toDateTimeString(),
            'updated_at' => $date->toDateTimeString()
        ];


        \DB::table('permissions')->insert($data);
    }
}