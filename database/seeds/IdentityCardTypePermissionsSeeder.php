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
 * Clase IdentityCardTypePermissionsSeeder
 *
 * @author  Johan Alvarez <llstarscreamll@hotmail.com>
 */
class IdentityCardTypePermissionsSeeder extends Seeder
{
    public function run()
    {
        $date = Carbon::now();
        $data = array();

        $data[] = [
            'slug' => 'identity-card-types.index',
            'name' => 'Listar Tipos de Documento de Identificación',
            'description' => 'Ver en una lista todos los Tipos de Documento de Identificación del sistema',
            'created_at' => $date->toDateTimeString(),
            'updated_at' => $date->toDateTimeString()
        ];
            
        $data[] = [
            'slug' => 'identity-card-types.create',
            'name' => 'Crear Tipo de Documento de Identificación',
            'description' => 'Crear nuevos Tipos de Documento de Identificación',
            'created_at' => $date->toDateTimeString(),
            'updated_at' => $date->toDateTimeString()
        ];
            
        $data[] = [
            'slug' => 'identity-card-types.show',
            'name' => 'Ver Tipo de Documento de Identificación',
            'description' => 'Visalizar la información de los Tipos de Documento de Identificación (sólo lectura)',
            'created_at' => $date->toDateTimeString(),
            'updated_at' => $date->toDateTimeString()
        ];
            
        $data[] = [
            'slug' => 'identity-card-types.edit',
            'name' => 'Actualizar Tipo de Documento de Identificación',
            'description' => 'Actualiza la información de los Tipos de Documento de Identificación del sistema',
            'created_at' => $date->toDateTimeString(),
            'updated_at' => $date->toDateTimeString()
        ];
        
        $data[] = [
            'slug' => 'identity-card-types.destroy',
            'name' => 'Eliminar Tipo de Documento de Identificación',
            'description' => 'Eliminar Tipos de Documento de Identificación del sistema',
            'created_at' => $date->toDateTimeString(),
            'updated_at' => $date->toDateTimeString()
        ];


        \DB::table('permissions')->insert($data);

        $this->call(AttachPermissionsToAdminRoleSeeder::class);
    }
}