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
 * Clase PilaPaymentOperatorPermissionsSeeder
 *
 * @author  Johan Alvarez <llstarscreamll@hotmail.com>
 */
class PilaPaymentOperatorPermissionsSeeder extends Seeder
{
    public function run()
    {
        $date = Carbon::now();
        $data = array();

        $data[] = [
            'slug' => 'pila-payment-operators.index',
            'name' => 'Listar Operadores de pago PILA',
            'description' => 'Ver en una lista todos los Operadores de pago PILA del sistema',
            'created_at' => $date->toDateTimeString(),
            'updated_at' => $date->toDateTimeString()
        ];
            
        $data[] = [
            'slug' => 'pila-payment-operators.create',
            'name' => 'Crear Operador de pago PILA',
            'description' => 'Crear nuevos Operadores de pago PILA',
            'created_at' => $date->toDateTimeString(),
            'updated_at' => $date->toDateTimeString()
        ];
            
        $data[] = [
            'slug' => 'pila-payment-operators.show',
            'name' => 'Ver Operador de pago PILA',
            'description' => 'Visalizar la información de los Operadores de pago PILA (sólo lectura)',
            'created_at' => $date->toDateTimeString(),
            'updated_at' => $date->toDateTimeString()
        ];
            
        $data[] = [
            'slug' => 'pila-payment-operators.edit',
            'name' => 'Actualizar Operador de pago PILA',
            'description' => 'Actualiza la información de los Operadores de pago PILA del sistema',
            'created_at' => $date->toDateTimeString(),
            'updated_at' => $date->toDateTimeString()
        ];
        
        $data[] = [
            'slug' => 'pila-payment-operators.destroy',
            'name' => 'Eliminar Operador de pago PILA',
            'description' => 'Eliminar Operadores de pago PILA del sistema',
            'created_at' => $date->toDateTimeString(),
            'updated_at' => $date->toDateTimeString()
        ];


        \DB::table('permissions')->insert($data);

        $this-call(AttachPermissionsToAdminRoleSeeder::class);
    }
}