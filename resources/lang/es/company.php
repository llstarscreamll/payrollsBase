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
        'identity_card_type_id' => 'Tipo de identificación',
        'contributor_identity_card_number' => 'No. de identificación',
        'verification_digit' => 'Dígito de verificación',
        'legal_company_nature_id' => 'Naturaleza jurídica',
        'person_type' => 'Tipo de persona',
        'address' => 'Dirección de correspondencia',
        'municipality_id' => 'Municipio',
        'dane_activity_code' => 'Código dane de actividad económica',
        'phone' => 'Teléfono',
        'fax' => 'Fax',
        'email' => 'Correo electrónico',
        'legal_rep_identity_card_type_id' => 'Tipo de identificación de repre. legal',
        'legal_rep_identity_card_number' => 'No. de identificación de repre. legal',
        'legal_rep_verification_digit' => 'Dígito de verificación de repre. legal',
        'legal_rep_first_name' => 'Primer nombre de repre. legal',
        'legal_rep_middle_name' => 'Segundo nombre de repre. legal',
        'legal_rep_first_surname' => 'Primer apellido de repre. legal',
        'legal_rep_last_surname' => 'Segundo apellido de repre. legal',
        'legal_rep_email' => 'Email de repre. legal',
        'contact_first_name' => 'Nombre dcontacto',
        'contact_last_name' => 'Apellido dcontacto',
        'contact_cell_phone' => 'Teléfono dcontacto',
        'contact_email' => 'Email dcontacto',
        'contributor_class_id' => 'Clase de aportante',
        'presentation_form' => 'Forma de presentación',
        'contributor_type_id' => 'Tipo de aportante',
        'payroll_type_id' => 'Tipo de planilla',
        'arl_company_id' => 'Compañía de arl',
        'arl_department_id' => 'Departamento de arl',
        'law_1429_from_2010' => 'Ley 1429 de 2010?',
        'law_1607_from_2012' => 'Ley 1607 de 2012?',
        'commercial_registration_date' => 'Fecha de matrícumercantil',
        'payment_method' => 'Medio de pago',
        'bank_id' => 'Banco dispersor de fondos',
        'bank_account_type' => 'Tipo de cuenta',
        'bank_account_number' => 'No.  de cuenta',
        'payment_frequency' => 'Frecuencia de pago',
        'pila_payment_operator_id' => 'Operador de pago pila',
    ],

    // nombres cortos de los elementos del formulario, para la tabla del index
    'table-columns' => [
        'id' => 'Id',
        'name' => 'Nombre',
        'identity_card_type_id' => 'Tipo de identificación',
        'contributor_identity_card_number' => 'No. de identificación',
        'verification_digit' => 'Dígito de verificación',
        'legal_company_nature_id' => 'Naturaleza jurídica',
        'person_type' => 'Tipo de persona',
        'address' => 'Dirección de correspondencia',
        'municipality_id' => 'Municipio',
        'dane_activity_code' => 'Código dane de actividad económica',
        'phone' => 'Teléfono',
        'fax' => 'Fax',
        'email' => 'Correo electrónico',
        'legal_rep_identity_card_type_id' => 'Tipo de identificación de repre. legal',
        'legal_rep_identity_card_number' => 'No. de identificación de repre. legal',
        'legal_rep_verification_digit' => 'Dígito de verificación de repre. legal',
        'legal_rep_first_name' => 'Primer nombre de repre. legal',
        'legal_rep_middle_name' => 'Segundo nombre de repre. legal',
        'legal_rep_first_surname' => 'Primer apellido de repre. legal',
        'legal_rep_last_surname' => 'Segundo apellido de repre. legal',
        'legal_rep_email' => 'Email de repre. legal',
        'contact_first_name' => 'Nombre dcontacto',
        'contact_last_name' => 'Apellido dcontacto',
        'contact_cell_phone' => 'Teléfono dcontacto',
        'contact_email' => 'Email dcontacto',
        'contributor_class_id' => 'Clase de aportante',
        'presentation_form' => 'Forma de presentación',
        'contributor_type_id' => 'Tipo de aportante',
        'payroll_type_id' => 'Tipo de planilla',
        'arl_company_id' => 'Compañía de arl',
        'arl_department_id' => 'Departamento de arl',
        'law_1429_from_2010' => 'Ley 1429 de 2010?',
        'law_1607_from_2012' => 'Ley 1607 de 2012?',
        'commercial_registration_date' => 'Fecha de matrícumercantil',
        'payment_method' => 'Medio de pago',
        'bank_id' => 'Banco dispersor de fondos',
        'bank_account_type' => 'Tipo de cuenta',
        'bank_account_number' => 'No.  de cuenta',
        'payment_frequency' => 'Frecuencia de pago',
        'pila_payment_operator_id' => 'Operador de pago pila',
    ],

    // Los nombres de los atributos de validación en Form Requests.
    'attributes' => [
        'id' => 'Id',
        'name' => 'Nombre',
        'identity_card_type_id' => 'Tipo de identificación',
        'contributor_identity_card_number' => 'No. de identificación',
        'verification_digit' => 'Dígito de verificación',
        'legal_company_nature_id' => 'Naturaleza jurídica',
        'person_type' => 'Tipo de persona',
        'address' => 'Dirección de correspondencia',
        'municipality_id' => 'Municipio',
        'dane_activity_code' => 'Código dane de actividad económica',
        'phone' => 'Teléfono',
        'fax' => 'Fax',
        'email' => 'Correo electrónico',
        'legal_rep_identity_card_type_id' => 'Tipo de identificación de repre. legal',
        'legal_rep_identity_card_number' => 'No. de identificación de repre. legal',
        'legal_rep_verification_digit' => 'Dígito de verificación de repre. legal',
        'legal_rep_first_name' => 'Primer nombre de repre. legal',
        'legal_rep_middle_name' => 'Segundo nombre de repre. legal',
        'legal_rep_first_surname' => 'Primer apellido de repre. legal',
        'legal_rep_last_surname' => 'Segundo apellido de repre. legal',
        'legal_rep_email' => 'Email de repre. legal',
        'contact_first_name' => 'Nombre dcontacto',
        'contact_last_name' => 'Apellido dcontacto',
        'contact_cell_phone' => 'Teléfono dcontacto',
        'contact_email' => 'Email dcontacto',
        'contributor_class_id' => 'Clase de aportante',
        'presentation_form' => 'Forma de presentación',
        'contributor_type_id' => 'Tipo de aportante',
        'payroll_type_id' => 'Tipo de planilla',
        'arl_company_id' => 'Compañía de arl',
        'arl_department_id' => 'Departamento de arl',
        'law_1429_from_2010' => 'Ley 1429 de 2010?',
        'law_1429_from_2010_true' => 'Ley 1429 de 2010? si',
        'law_1429_from_2010_false' => 'Ley 1429 de 2010? no',
        'law_1607_from_2012' => 'Ley 1607 de 2012?',
        'law_1607_from_2012_true' => 'Ley 1607 de 2012? si',
        'law_1607_from_2012_false' => 'Ley 1607 de 2012? no',
        'commercial_registration_date' => 'Fecha de matrícumercantil',
        'commercial_registration_date[from]' => 'Fecha de matrícumercantil inicial',
        'commercial_registration_date[to]' => 'Fecha de matrícumercantil final',
        'payment_method' => 'Medio de pago',
        'bank_id' => 'Banco dispersor de fondos',
        'bank_account_type' => 'Tipo de cuenta',
        'bank_account_number' => 'No.  de cuenta',
        'payment_frequency' => 'Frecuencia de pago',
        'pila_payment_operator_id' => 'Operador de pago pila',
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
