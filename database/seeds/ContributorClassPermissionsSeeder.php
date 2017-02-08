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
 * Clase ContributorClassPermissionsSeeder
 *
 * @author  Johan Alvarez <llstarscreamll@hotmail.com>
 */
class ContributorClassPermissionsSeeder extends Seeder
{
    public function run()
    {
        $date = Carbon::now();
        $data = array();

        $data[] = [
            'slug' => 'contributor-classes.index',
            'name' => 'Listar Clases de aportante',
            'description' => 'Ver en una lista todos los Clases de aportante del sistema',
            'created_at' => $date->toDateTimeString(),
            'updated_at' => $date->toDateTimeString()
        ];
            
        $data[] = [
            'slug' => 'contributor-classes.create',
            'name' => 'Crear Clase de aportante',
            'description' => 'Crear nuevos Clases de aportante',
            'created_at' => $date->toDateTimeString(),
            'updated_at' => $date->toDateTimeString()
        ];
            
        $data[] = [
            'slug' => 'contributor-classes.show',
            'name' => 'Ver Clase de aportante',
            'description' => 'Visalizar la información de los Clases de aportante (sólo lectura)',
            'created_at' => $date->toDateTimeString(),
            'updated_at' => $date->toDateTimeString()
        ];
            
        $data[] = [
            'slug' => 'contributor-classes.edit',
            'name' => 'Actualizar Clase de aportante',
            'description' => 'Actualiza la información de los Clases de aportante del sistema',
            'created_at' => $date->toDateTimeString(),
            'updated_at' => $date->toDateTimeString()
        ];
        
        $data[] = [
            'slug' => 'contributor-classes.destroy',
            'name' => 'Eliminar Clase de aportante',
            'description' => 'Eliminar Clases de aportante del sistema',
            'created_at' => $date->toDateTimeString(),
            'updated_at' => $date->toDateTimeString()
        ];


        \DB::table('permissions')->insert($data);
    }
}