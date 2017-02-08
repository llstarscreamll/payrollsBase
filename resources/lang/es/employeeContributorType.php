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
        'name' => 'Tipos de empleado aportante',
        'short-name' => 'Tipos de empleado aportante',
        'name-singular' => 'Tipo de empleado aportante',
    ],

    'index-create-btn' => 'Crear Tipo de empleado aportante',
    'index-create-form-modal-title' => 'Crear Nuevo Tipo de empleado aportante',
    
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
    'store_employee_contributor_type_success' => 'Tipo de empleado aportante creado correctamente.',
    'update_employee_contributor_type_success' => 'Tipo de empleado aportante actualizado correctamente.',
    'destroy_employee_contributor_type_success' => 'Tipo de empleado aportante eliminado correctamente.|Los tipos de empleado aportante han sido movidos a la papelera correctamente.',
];
