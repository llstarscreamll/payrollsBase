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
 * Clase ContributorTypePermissionsSeeder
 *
 * @author  Johan Alvarez <llstarscreamll@hotmail.com>
 */
class ContributorTypePermissionsSeeder extends Seeder
{
    public function run()
    {
        $date = Carbon::now();
        $data = array();

        $data[] = [
            'slug' => 'contributor-types.index',
            'name' => 'Listar Tipos de aportante',
            'description' => 'Ver en una lista todos los Tipos de aportante del sistema',
            'created_at' => $date->toDateTimeString(),
            'updated_at' => $date->toDateTimeString()
        ];
            
        $data[] = [
            'slug' => 'contributor-types.create',
            'name' => 'Crear Tipo de aportante',
            'description' => 'Crear nuevos Tipos de aportante',
            'created_at' => $date->toDateTimeString(),
            'updated_at' => $date->toDateTimeString()
        ];
            
        $data[] = [
            'slug' => 'contributor-types.show',
            'name' => 'Ver Tipo de aportante',
            'description' => 'Visalizar la información de los Tipos de aportante (sólo lectura)',
            'created_at' => $date->toDateTimeString(),
            'updated_at' => $date->toDateTimeString()
        ];
            
        $data[] = [
            'slug' => 'contributor-types.edit',
            'name' => 'Actualizar Tipo de aportante',
            'description' => 'Actualiza la información de los Tipos de aportante del sistema',
            'created_at' => $date->toDateTimeString(),
            'updated_at' => $date->toDateTimeString()
        ];
        
        $data[] = [
            'slug' => 'contributor-types.destroy',
            'name' => 'Eliminar Tipo de aportante',
            'description' => 'Eliminar Tipos de aportante del sistema',
            'created_at' => $date->toDateTimeString(),
            'updated_at' => $date->toDateTimeString()
        ];


        \DB::table('permissions')->insert($data);

        $this->call(AttachPermissionsToAdminRoleSeeder::class);
    }
}