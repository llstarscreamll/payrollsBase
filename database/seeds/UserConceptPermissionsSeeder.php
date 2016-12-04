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
 * Clase UserConceptPermissionsSeeder
 *
 * @author  Johan Alvarez <llstarscreamll@hotmail.com>
 */
class UserConceptPermissionsSeeder extends Seeder
{
    public function run()
    {
        $date = Carbon::now();
        $data = array();

        $data[] = [
            'slug' => 'user-concepts.index',
            'name' => 'Listar Conceptos',
            'description' => 'Ver en una lista todos los Conceptos del sistema',
            'created_at' => $date->toDateTimeString(),
            'updated_at' => $date->toDateTimeString()
        ];
            
        $data[] = [
            'slug' => 'user-concepts.create',
            'name' => 'Crear Concepto',
            'description' => 'Crear nuevos Conceptos',
            'created_at' => $date->toDateTimeString(),
            'updated_at' => $date->toDateTimeString()
        ];
            
        $data[] = [
            'slug' => 'user-concepts.show',
            'name' => 'Ver Concepto',
            'description' => 'Visalizar la información de los Conceptos (sólo lectura)',
            'created_at' => $date->toDateTimeString(),
            'updated_at' => $date->toDateTimeString()
        ];
            
        $data[] = [
            'slug' => 'user-concepts.edit',
            'name' => 'Actualizar Concepto',
            'description' => 'Actualiza la información de los Conceptos del sistema',
            'created_at' => $date->toDateTimeString(),
            'updated_at' => $date->toDateTimeString()
        ];
        
        $data[] = [
            'slug' => 'user-concepts.destroy',
            'name' => 'Eliminar Concepto',
            'description' => 'Eliminar Conceptos del sistema',
            'created_at' => $date->toDateTimeString(),
            'updated_at' => $date->toDateTimeString()
        ];


        \DB::table('permissions')->insert($data);
    }
}