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
        'name' => 'Empleados',
        'short-name' => 'Empleados',
        'name-singular' => 'Empleado',
    ],

    'index-create-btn' => 'Crear Empleado',
    'index-create-form-modal-title' => 'Crear Nuevo Empleado',
    
    // nombres de los elementos del formulario
    'form-labels' => [
        'id' => 'Id',
        'dni' => 'Número de documento de identidad',
        'name' => 'Nombre',
        'lastname' => 'Apellido',
        'branch_id' => 'Sucursal',
        'contract_type' => 'Tipo de contrato',
        'contract_type_values' => ['I','F','L'],
        'salary' => 'Salario',
        'salary_type' => 'Tipo de salario',
        'salary_type_values' => ['I','O1','O2'],
        'occupational_risk_level' => 'Nivde riesgo ocupacional',
        'occupational_risk_level_values' => ['I','II','III','IV','V'],
        'employee_taxpayer_type_id' => 'Tipo de cotizante',
        'dependents_deduction' => 'Deducción por dependientes',
        'average_EPS_contributions_last_year' => 'Promedio de aportes a eps dúltimo año',
        'home_interest_deduction_last_year' => 'Deducción intereses de vivienda último año',
        'prepaid_medicine' => 'Medicina prepagada',
        'applay_2090_decree' => 'Aplica decreto 2090?',
        'contributor_subtype' => 'Subtipo de cotizante?',
        'admitted_at' => 'Fecha de ingreso',
        'egressed_at' => 'Fecha de egreso',
        'created_at' => 'Fecha de creación',
        'updated_at' => 'Fecha de actualización',
    ],

    // nombres cortos de los elementos del formulario, para la tabla del index
    'table-columns' => [
        'id' => 'Id',
        'dni' => 'Número de documento de identidad',
        'name' => 'Nombre',
        'lastname' => 'Apellido',
        'branch_id' => 'Sucursal',
        'contract_type' => 'Tipo de contrato',
        'salary' => 'Salario',
        'salary_type' => 'Tipo de salario',
        'occupational_risk_level' => 'Nivde riesgo ocupacional',
        'employee_taxpayer_type_id' => 'Tipo de cotizante',
        'dependents_deduction' => 'Deducción por dependientes',
        'average_EPS_contributions_last_year' => 'Promedio de aportes a eps dúltimo año',
        'home_interest_deduction_last_year' => 'Deducción intereses de vivienda último año',
        'prepaid_medicine' => 'Medicina prepagada',
        'applay_2090_decree' => 'Aplica decreto 2090?',
        'contributor_subtype' => 'Subtipo de cotizante?',
        'admitted_at' => 'Fecha de ingreso',
        'egressed_at' => 'Fecha de egreso',
        'created_at' => 'Fecha de creación',
        'updated_at' => 'Fecha de actualización',
    ],

    // Los nombres de los atributos de validación en Form Requests.
    'attributes' => [
        'id' => 'Id',
        'dni' => 'Número de documento de identidad',
        'name' => 'Nombre',
        'lastname' => 'Apellido',
        'branch_id' => 'Sucursal',
        'contract_type' => 'Tipo de contrato',
        'salary' => 'Salario',
        'salary_type' => 'Tipo de salario',
        'occupational_risk_level' => 'Nivde riesgo ocupacional',
        'employee_taxpayer_type_id' => 'Tipo de cotizante',
        'dependents_deduction' => 'Deducción por dependientes',
        'average_EPS_contributions_last_year' => 'Promedio de aportes a eps dúltimo año',
        'home_interest_deduction_last_year' => 'Deducción intereses de vivienda último año',
        'prepaid_medicine' => 'Medicina prepagada',
        'applay_2090_decree' => 'Aplica decreto 2090?',
        'applay_2090_decree_true' => 'Aplica decreto 2090? si',
        'applay_2090_decree_false' => 'Aplica decreto 2090? no',
        'contributor_subtype' => 'Subtipo de cotizante?',
        'contributor_subtype_true' => 'Subtipo de cotizante? si',
        'contributor_subtype_false' => 'Subtipo de cotizante? no',
        'admitted_at' => 'Fecha de ingreso',
        'admitted_at[from]' => 'Fecha de ingreso inicial',
        'admitted_at[to]' => 'Fecha de ingreso final',
        'egressed_at' => 'Fecha de egreso',
        'egressed_at[from]' => 'Fecha de egreso inicial',
        'egressed_at[to]' => 'Fecha de egreso final',
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
    'store_employee_success' => 'Empleado creado correctamente.',
    'update_employee_success' => 'Empleado actualizado correctamente.',
    'destroy_employee_success' => 'Empleado eliminado correctamente.|Los empleados han sido movidos a la papelera correctamente.',
];
