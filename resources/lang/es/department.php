<?php

/**
 * Este archivo es parte de .
 * (c) Johan Alvarez <llstarscreamll@hotmail.com>
 * Licensed under The MIT License (MIT).
 *
 * @package    
 * @version    0.1
 * @author     Johan Alvarez
 * @license    The MIT License (MIT)
 * @copyright  (c) 2015-2016, Johan Alvarez <llstarscreamll@hotmail.com>
 * @link       https://github.com/llstarscreamll
 */

return [

    /**
     * Líneas de idioma en español para la interfaz, mensajes de validación,
     * nombres de campos de validación, mensajes de transacciones, etc...
     */
    
    // nombre del módulo
    'module' => [
        'name' => '',
        'short-name' => '',
        'name-singular' => '',
    ],

    'index-create-btn' => 'Crear ',
    'index-create-form-modal-title' => 'Crear Nuevo ',
    
    // nombres de los elementos del formulario
    'form-labels' => [
        'id' => 'Id',
        'country_id' => 'País',
        'code' => 'Código',
        'name' => 'Nombre',
    ],

    // nombres cortos de los elementos del formulario, para la tabla del index
    'table-columns' => [
        'id' => 'Id',
        'country_id' => 'País',
        'code' => 'Código',
        'name' => 'Nombre',
    ],

    // Los nombres de los atributos de validación en Form Requests.
    'attributes' => [
        'id' => 'Id',
        'country_id' => 'País',
        'code' => 'Código',
        'name' => 'Nombre',
    ],

    // Los mensajes personalizados de validación en Form Requests.
    'messages' => [
        'foo' => 'msg'
    ],

    // mensajes de transacciones
    'store_department_success' => ' creado correctamente.',
    'update_department_success' => ' actualizado correctamente.',
    'destroy_department_success' => ' eliminado correctamente.|Los  han sido movidos a la papelera correctamente.',
];
