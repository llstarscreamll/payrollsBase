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
        'name' => 'Clases de aportante',
        'short-name' => 'Clases de aportante',
        'name-singular' => 'Clase de aportante',
    ],

    'index-create-btn' => 'Crear Clase de aportante',
    'index-create-form-modal-title' => 'Crear Nuevo Clase de aportante',
    
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
    'store_contributor_class_success' => 'Clase de aportante creado correctamente.',
    'update_contributor_class_success' => 'Clase de aportante actualizado correctamente.',
    'destroy_contributor_class_success' => 'Clase de aportante eliminado correctamente.|Los clases de aportante han sido movidos a la papelera correctamente.',
];
