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
        'name' => 'Tipos de Personas',
        'short-name' => 'Tipos de Personas',
        'name-singular' => 'Tipo de Persona',
    ],

    'index-create-btn' => 'Crear Tipo de Persona',
    'index-create-form-modal-title' => 'Crear Nuevo Tipo de Persona',
    
    // nombres de los elementos del formulario
    'form-labels' => [
        'id' => 'Id',
        'name' => 'Nombre',
        'short_name' => 'Nombre corto',
        'created_at' => 'Fecha de creación',
        'updated_at' => 'Fecha de actualización',
    ],

    // nombres cortos de los elementos del formulario, para la tabla del index
    'table-columns' => [
        'id' => 'Id',
        'name' => 'Nombre',
        'short_name' => 'Nombre corto',
        'created_at' => 'Fecha de creación',
        'updated_at' => 'Fecha de actualización',
    ],

    // Los nombres de los atributos de validación en Form Requests.
    'attributes' => [
        'id' => 'Id',
        'name' => 'Nombre',
        'short_name' => 'Nombre corto',
        'created_at' => 'Fecha de creación',
        'created_at[from]' => 'Fecha de creación inicial',
        'created_at[to]' => 'Fecha de creación final',
        'updated_at' => 'Fecha de actualización',
        'updated_at[from]' => 'Fecha de actualización inicial',
        'updated_at[to]' => 'Fecha de actualización final',
    ],

    // Los mensajes personalizados de validación en Form Requests.
    'messages' => [
        'foo' => 'msg'
    ],

    // mensajes de transacciones
    'store_legal_person_nature_success' => 'Tipo de Persona creado correctamente.',
    'update_legal_person_nature_success' => 'Tipo de Persona actualizado correctamente.',
    'destroy_legal_person_nature_success' => 'Tipo de Persona eliminado correctamente.|Los tipos de personas han sido movidos a la papelera correctamente.',
];
