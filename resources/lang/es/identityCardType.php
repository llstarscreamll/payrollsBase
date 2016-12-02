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
        'name' => 'Tipos de Documento de Identificación',
        'short-name' => 'Tipos de Documento de Identificación',
        'name-singular' => 'Tipo de Documento de Identificación',
    ],

    'index-create-btn' => 'Crear Tipo de Documento de Identificación',
    'index-create-form-modal-title' => 'Crear Nuevo Tipo de Documento de Identificación',
    
    // nombres de los elementos del formulario
    'form-labels' => [
        'id' => 'Id',
        'name' => 'Nombre',
        'short_name' => 'Nombre corto',
        'created_at' => 'Fecha de actualización',
        'updated_at' => 'Fecha de actualización',
    ],

    // nombres cortos de los elementos del formulario, para la tabla del index
    'table-columns' => [
        'id' => 'Id',
        'name' => 'Nombre',
        'short_name' => 'Nombre corto',
        'created_at' => 'Fecha de actualización',
        'updated_at' => 'Fecha de actualización',
    ],

    // Los nombres de los atributos de validación en Form Requests.
    'attributes' => [
        'id' => 'Id',
        'name' => 'Nombre',
        'short_name' => 'Nombre corto',
        'created_at' => 'Fecha de actualización',
        'created_at[from]' => 'Fecha de actualización inicial',
        'created_at[to]' => 'Fecha de actualización final',
        'updated_at' => 'Fecha de actualización',
        'updated_at[from]' => 'Fecha de actualización inicial',
        'updated_at[to]' => 'Fecha de actualización final',
    ],

    // Los mensajes personalizados de validación en Form Requests.
    'messages' => [
        'foo' => 'msg'
    ],

    // mensajes de transacciones
    'store_identity_card_type_success' => 'Tipo de Documento de Identificación creado correctamente.',
    'update_identity_card_type_success' => 'Tipo de Documento de Identificación actualizado correctamente.',
    'destroy_identity_card_type_success' => 'Tipo de Documento de Identificación eliminado correctamente.|Los tipos de documento de identificación han sido movidos a la papelera correctamente.',
];
