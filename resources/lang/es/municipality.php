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

return [

    /**
     * Líneas de idioma en español para la interfaz, mensajes de validación,
     * nombres de campos de validación, mensajes de transacciones, etc...
     */
    
    // nombre del módulo
    'module' => [
        'name' => 'Municipios',
        'short-name' => 'Municipios',
        'name-singular' => 'Municipio',
    ],

    'index-create-btn' => 'Crear Municipio',
    'index-create-form-modal-title' => 'Crear Nuevo Municipio',
    
    // nombres de los elementos del formulario
    'form-labels' => [
        'id' => 'Id',
        'department_id' => 'Departamento',
        'code' => 'Código',
        'name' => 'Nombre',
    ],

    // nombres cortos de los elementos del formulario, para la tabla del index
    'table-columns' => [
        'id' => 'Id',
        'department_id' => 'Departamento',
        'code' => 'Código',
        'name' => 'Nombre',
    ],

    // Los nombres de los atributos de validación en Form Requests.
    'attributes' => [
        'id' => 'Id',
        'department_id' => 'Departamento',
        'code' => 'Código',
        'name' => 'Nombre',
    ],

    // Los mensajes personalizados de validación en Form Requests.
    'messages' => [
        'foo' => 'msg'
    ],

    // mensajes de transacciones
    'store_municipality_success' => 'Municipio creado correctamente.',
    'update_municipality_success' => 'Municipio actualizado correctamente.',
    'destroy_municipality_success' => 'Municipio eliminado correctamente.|Los municipios han sido movidos a la papelera correctamente.',
];
