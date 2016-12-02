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
 * Clase LegalPersonNaturePermissionsSeeder
 *
 * @author  Johan Alvarez <llstarscreamll@hotmail.com>
 */
class LegalPersonNaturePermissionsSeeder extends Seeder
{
    public function run()
    {
        $date = Carbon::now();
        $data = array();

        $data[] = [
            'slug' => 'legal-person-natures.index',
            'name' => 'Listar Tipos de Personas',
            'description' => 'Ver en una lista todos los Tipos de Personas del sistema',
            'created_at' => $date->toDateTimeString(),
            'updated_at' => $date->toDateTimeString()
        ];
            
        $data[] = [
            'slug' => 'legal-person-natures.create',
            'name' => 'Crear Tipo de Persona',
            'description' => 'Crear nuevos Tipos de Personas',
            'created_at' => $date->toDateTimeString(),
            'updated_at' => $date->toDateTimeString()
        ];
            
        $data[] = [
            'slug' => 'legal-person-natures.show',
            'name' => 'Ver Tipo de Persona',
            'description' => 'Visalizar la información de los Tipos de Personas (sólo lectura)',
            'created_at' => $date->toDateTimeString(),
            'updated_at' => $date->toDateTimeString()
        ];
            
        $data[] = [
            'slug' => 'legal-person-natures.edit',
            'name' => 'Actualizar Tipo de Persona',
            'description' => 'Actualiza la información de los Tipos de Personas del sistema',
            'created_at' => $date->toDateTimeString(),
            'updated_at' => $date->toDateTimeString()
        ];
        
        $data[] = [
            'slug' => 'legal-person-natures.destroy',
            'name' => 'Eliminar Tipo de Persona',
            'description' => 'Eliminar Tipos de Personas del sistema',
            'created_at' => $date->toDateTimeString(),
            'updated_at' => $date->toDateTimeString()
        ];


        \DB::table('permissions')->insert($data);
    }
}