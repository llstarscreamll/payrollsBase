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
        'name' => 'Compañías de ARL',
        'short-name' => 'Compañías de ARL',
        'name-singular' => 'Compañía de ARL',
    ],

    'index-create-btn' => 'Crear Compañía de ARL',
    'index-create-form-modal-title' => 'Crear Nuevo Compañía de ARL',
    
    // nombres de los elementos del formulario
    'form-labels' => [
        'id' => 'Id',
        'name' => 'Nombre',
        'short_name' => 'Nombre corto',
    ],

    // nombres cortos de los elementos del formulario, para la tabla del index
    'table-columns' => [
        'id' => 'Id',
        'name' => 'Nombre',
        'short_name' => 'Nombre corto',
    ],

    // Los nombres de los atributos de validación en Form Requests.
    'attributes' => [
        'id' => 'Id',
        'name' => 'Nombre',
        'short_name' => 'Nombre corto',
    ],

    // Los mensajes personalizados de validación en Form Requests.
    'messages' => [
        'foo' => 'msg'
    ],

    // mensajes de transacciones
    'store_arl_company_success' => 'Compañía de ARL creado correctamente.',
    'update_arl_company_success' => 'Compañía de ARL actualizado correctamente.',
    'destroy_arl_company_success' => 'Compañía de ARL eliminado correctamente.|Los compañías de arl han sido movidos a la papelera correctamente.',
];
