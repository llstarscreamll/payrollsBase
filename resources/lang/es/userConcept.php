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
        'name' => 'Conceptos',
        'short-name' => 'Conceptos',
        'name-singular' => 'Concepto',
    ],

    'index-create-btn' => 'Crear Concepto',
    'index-create-form-modal-title' => 'Crear Nuevo Concepto',
    
    // nombres de los elementos del formulario
    'form-labels' => [
        'id' => 'Id',
        'name' => 'Nombre',
        'type' => 'Tipo',
        'type_values' => ['accrual','deduction','not_operate'],
        'is_wage' => 'Es salarial?',
        'apply_1393_law' => 'Ley 1393?',
        'retention' => 'Retención',
        'ibc_health' => 'Ibc salud',
        'ibc_pension' => 'Ibc pensión',
        'ibc_arl' => 'Ibc arl',
        'ccf_base' => 'Base para ccf',
        'sena_base' => 'Base para sena',
        'icbf_base' => 'Base para icbf',
        'severance_base' => 'Base para cesantías',
        'premium_base' => 'Base para prima',
        'provisioning_holiday' => 'Provisión vacaciones',
        'money_holiday_base' => 'Dinero vacaciones',
        'holidays_enjoyed' => 'Vacaciones disfrutadas',
        'holiday_contract_settlement' => 'Vacaciones liquidación contrato',
        'indemnity' => 'Indemnización',
    ],

    // nombres cortos de los elementos del formulario, para la tabla del index
    'table-columns' => [
        'id' => 'Id',
        'name' => 'Nombre',
        'type' => 'Tipo',
        'is_wage' => 'Es salarial?',
        'apply_1393_law' => 'Ley 1393?',
        'retention' => 'Retención',
        'ibc_health' => 'Ibc salud',
        'ibc_pension' => 'Ibc pensión',
        'ibc_arl' => 'Ibc arl',
        'ccf_base' => 'Base para ccf',
        'sena_base' => 'Base para sena',
        'icbf_base' => 'Base para icbf',
        'severance_base' => 'Base para cesantías',
        'premium_base' => 'Base para prima',
        'provisioning_holiday' => 'Provisión vacaciones',
        'money_holiday_base' => 'Dinero vacaciones',
        'holidays_enjoyed' => 'Vacaciones disfrutadas',
        'holiday_contract_settlement' => 'Vacaciones liquidación contrato',
        'indemnity' => 'Indemnización',
    ],

    // Los nombres de los atributos de validación en Form Requests.
    'attributes' => [
        'id' => 'Id',
        'name' => 'Nombre',
        'type' => 'Tipo',
        'is_wage' => 'Es salarial?',
        'is_wage_true' => 'Es salarial? si',
        'is_wage_false' => 'Es salarial? no',
        'apply_1393_law' => 'Ley 1393?',
        'apply_1393_law_true' => 'Ley 1393? si',
        'apply_1393_law_false' => 'Ley 1393? no',
        'retention' => 'Retención',
        'retention_true' => 'Retención si',
        'retention_false' => 'Retención no',
        'ibc_health' => 'Ibc salud',
        'ibc_health_true' => 'Ibc salud si',
        'ibc_health_false' => 'Ibc salud no',
        'ibc_pension' => 'Ibc pensión',
        'ibc_pension_true' => 'Ibc pensión si',
        'ibc_pension_false' => 'Ibc pensión no',
        'ibc_arl' => 'Ibc arl',
        'ibc_arl_true' => 'Ibc arl si',
        'ibc_arl_false' => 'Ibc arl no',
        'ccf_base' => 'Base para ccf',
        'ccf_base_true' => 'Base para ccf si',
        'ccf_base_false' => 'Base para ccf no',
        'sena_base' => 'Base para sena',
        'sena_base_true' => 'Base para sena si',
        'sena_base_false' => 'Base para sena no',
        'icbf_base' => 'Base para icbf',
        'icbf_base_true' => 'Base para icbf si',
        'icbf_base_false' => 'Base para icbf no',
        'severance_base' => 'Base para cesantías',
        'severance_base_true' => 'Base para cesantías si',
        'severance_base_false' => 'Base para cesantías no',
        'premium_base' => 'Base para prima',
        'premium_base_true' => 'Base para prima si',
        'premium_base_false' => 'Base para prima no',
        'provisioning_holiday' => 'Provisión vacaciones',
        'provisioning_holiday_true' => 'Provisión vacaciones si',
        'provisioning_holiday_false' => 'Provisión vacaciones no',
        'money_holiday_base' => 'Dinero vacaciones',
        'money_holiday_base_true' => 'Dinero vacaciones si',
        'money_holiday_base_false' => 'Dinero vacaciones no',
        'holidays_enjoyed' => 'Vacaciones disfrutadas',
        'holidays_enjoyed_true' => 'Vacaciones disfrutadas si',
        'holidays_enjoyed_false' => 'Vacaciones disfrutadas no',
        'holiday_contract_settlement' => 'Vacaciones liquidación contrato',
        'holiday_contract_settlement_true' => 'Vacaciones liquidación contrato si',
        'holiday_contract_settlement_false' => 'Vacaciones liquidación contrato no',
        'indemnity' => 'Indemnización',
        'indemnity_true' => 'Indemnización si',
        'indemnity_false' => 'Indemnización no',
    ],

    // Los mensajes personalizados de validación en Form Requests.
    'messages' => [
        'foo' => 'msg'
    ],

    // mensajes de transacciones
    'store_user_concept_success' => 'Concepto creado correctamente.',
    'update_user_concept_success' => 'Concepto actualizado correctamente.',
    'destroy_user_concept_success' => 'Concepto eliminado correctamente.|Los conceptos han sido movidos a la papelera correctamente.',
];
