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
        'name' => 'Empresas',
        'short-name' => 'Empresas',
        'name-singular' => 'Empresa',
    ],

    'index-create-btn' => 'Crear Empresa',
    'index-create-form-modal-title' => 'Crear Nuevo Empresa',
    
    // nombres de los elementos del formulario
    'form-labels' => [
        'id' => 'Id',
        'name' => 'Nombre',
        'identity_card_type_id' => 'Tipo de documento',
        'contributor_identity_card_number' => 'Número ddocumento',
        'verification_digit' => 'Dígito de verificación',
        'company_taxpayer_type_id' => 'Tipo de aportante',
        'legal_company_nature_id' => 'Naturaleza jurídica',
        'legal_person_nature_id' => 'Tipo de persona',
        'has_branches' => 'Tiene sucursales?',
        'applay_1607_law' => 'Aplica ley 1604?',
        'applay_1429_law' => 'Aplica ley 1429?',
        'founded_at' => 'Fecha en que fue fundada',
        'address' => 'Dirección',
        'municipality_id' => 'Departamento',
        'created_at' => 'Fecha de creación',
        'updated_at' => 'Fecha de actualización',
    ],

    // nombres cortos de los elementos del formulario, para la tabla del index
    'table-columns' => [
        'id' => 'Id',
        'name' => 'Nombre',
        'identity_card_type_id' => 'Tipo de documento',
        'contributor_identity_card_number' => 'Número ddocumento',
        'verification_digit' => 'Dígito de verificación',
        'company_taxpayer_type_id' => 'Tipo de aportante',
        'legal_company_nature_id' => 'Naturaleza jurídica',
        'legal_person_nature_id' => 'Tipo de persona',
        'has_branches' => 'Tiene sucursales?',
        'applay_1607_law' => 'Aplica ley 1604?',
        'applay_1429_law' => 'Aplica ley 1429?',
        'founded_at' => 'Fecha en que fue fundada',
        'address' => 'Dirección',
        'municipality_id' => 'Departamento',
        'created_at' => 'Fecha de creación',
        'updated_at' => 'Fecha de actualización',
    ],

    // Los nombres de los atributos de validación en Form Requests.
    'attributes' => [
        'id' => 'Id',
        'name' => 'Nombre',
        'identity_card_type_id' => 'Tipo de documento',
        'contributor_identity_card_number' => 'Número ddocumento',
        'verification_digit' => 'Dígito de verificación',
        'company_taxpayer_type_id' => 'Tipo de aportante',
        'legal_company_nature_id' => 'Naturaleza jurídica',
        'legal_person_nature_id' => 'Tipo de persona',
        'has_branches' => 'Tiene sucursales?',
        'has_branches_true' => 'Tiene sucursales? si',
        'has_branches_false' => 'Tiene sucursales? no',
        'applay_1607_law' => 'Aplica ley 1604?',
        'applay_1607_law_true' => 'Aplica ley 1604? si',
        'applay_1607_law_false' => 'Aplica ley 1604? no',
        'applay_1429_law' => 'Aplica ley 1429?',
        'applay_1429_law_true' => 'Aplica ley 1429? si',
        'applay_1429_law_false' => 'Aplica ley 1429? no',
        'founded_at' => 'Fecha en que fue fundada',
        'founded_at[from]' => 'Fecha en que fue fundada inicial',
        'founded_at[to]' => 'Fecha en que fue fundada final',
        'address' => 'Dirección',
        'municipality_id' => 'Departamento',
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
    'store_company_success' => 'Empresa creado correctamente.',
    'update_company_success' => 'Empresa actualizado correctamente.',
    'destroy_company_success' => 'Empresa eliminado correctamente.|Los empresas han sido movidos a la papelera correctamente.',
];
