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

return [

    /**
     * Líneas de idioma en español para la interfaz, mensajes de validación,
     * nombres de campos de validación, mensajes de transacciones, etc...
     */
    
    // nombre del módulo
    'module' => [
        'name' => 'Sucursales',
        'short-name' => 'Sucursales',
        'name-singular' => 'Sucursal',
    ],

    'index-create-btn' => 'Crear Sucursal',
    'index-create-form-modal-title' => 'Crear Nuevo Sucursal',
    
    // nombres de los elementos del formulario
    'form-labels' => [
        'id' => 'Id',
        'company_id' => 'Empresa',
        'name' => 'Nombre',
    ],

    // nombres cortos de los elementos del formulario, para la tabla del index
    'table-columns' => [
        'id' => 'Id',
        'company_id' => 'Empresa',
        'name' => 'Nombre',
    ],

    // Los nombres de los atributos de validación en Form Requests.
    'attributes' => [
        'id' => 'Id',
        'company_id' => 'Empresa',
        'name' => 'Nombre',
    ],

    // Los mensajes personalizados de validación en Form Requests.
    'messages' => [
        'foo' => 'msg'
    ],

    // mensajes de transacciones
    'store_branch_office_success' => 'Sucursal creado correctamente.',
    'update_branch_office_success' => 'Sucursal actualizado correctamente.',
    'destroy_branch_office_success' => 'Sucursal eliminado correctamente.|Los sucursales han sido movidos a la papelera correctamente.',
];
