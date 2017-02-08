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
        'name' => 'Operadores de pago PILA',
        'short-name' => 'Operadores de pago PILA',
        'name-singular' => 'Operador de pago PILA',
    ],

    'index-create-btn' => 'Crear Operador de pago PILA',
    'index-create-form-modal-title' => 'Crear Nuevo Operador de pago PILA',
    
    // nombres de los elementos del formulario
    'form-labels' => [
        'id' => 'Id',
        'name' => 'Nombre',
        'short_name' => 'Nombre corto',
        'phone' => 'Teléfono',
        'email' => 'Correo electrónico',
        'website' => 'Sitio web',
    ],

    // nombres cortos de los elementos del formulario, para la tabla del index
    'table-columns' => [
        'id' => 'Id',
        'name' => 'Nombre',
        'short_name' => 'Nombre corto',
        'phone' => 'Teléfono',
        'email' => 'Correo electrónico',
        'website' => 'Sitio web',
    ],

    // Los nombres de los atributos de validación en Form Requests.
    'attributes' => [
        'id' => 'Id',
        'name' => 'Nombre',
        'short_name' => 'Nombre corto',
        'phone' => 'Teléfono',
        'email' => 'Correo electrónico',
        'website' => 'Sitio web',
    ],

    // Los mensajes personalizados de validación en Form Requests.
    'messages' => [
        'foo' => 'msg'
    ],

    // mensajes de transacciones
    'store_pila_payment_operator_success' => 'Operador de pago PILA creado correctamente.',
    'update_pila_payment_operator_success' => 'Operador de pago PILA actualizado correctamente.',
    'destroy_pila_payment_operator_success' => 'Operador de pago PILA eliminado correctamente.|Los operadores de pago pila han sido movidos a la papelera correctamente.',
];
