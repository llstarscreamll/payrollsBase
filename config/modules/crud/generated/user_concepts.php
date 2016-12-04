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

return array (
  'table_name' => 'user_concepts',
  'create_permissions' => '1',
  'checkbox_component_on_index_table' => 'iCheck',
  'use_DateTimePicker_on_form_fields' => '1',
  'use_modal_confirmation_on_delete' => '1',
  'UI_theme' => 'Inspinia',
  'plural_entity_name' => 'Conceptos',
  'single_entity_name' => 'Concepto',
  'is_part_of_package' => 'Payrolls',
  'id_for_user' => 'name',
  'field' => 
  array (
    0 => 
    array (
      'name' => 'id',
      'type' => 'int',
      'required' => '1',
      'defValue' => '',
      'key' => 'PRI',
      'maxLength' => '10',
      'namespace' => '',
      'relation' => '',
      'label' => 'El id',
      'testData' => '1',
      'testDataUpdate' => '',
      'validation_rules' => '',
    ),
    1 => 
    array (
      'name' => 'name',
      'type' => 'varchar',
      'required' => '1',
      'defValue' => '',
      'key' => '',
      'maxLength' => '255',
      'namespace' => '',
      'relation' => '',
      'fillable' => '1',
      'on_index_table' => '1',
      'on_create_form' => '1',
      'on_update_form' => '1',
      'label' => 'El nombre',
      'testData' => '\'Hora extra nocturna\'',
      'testDataUpdate' => '\'Hora extra Diurna\'',
      'validation_rules' => '',
    ),
    2 => 
    array (
      'name' => 'type',
      'type' => 'enum',
      'required' => '1',
      'defValue' => 'not_operate',
      'key' => '',
      'maxLength' => '0',
      'namespace' => '',
      'relation' => '',
      'fillable' => '1',
      'on_index_table' => '1',
      'on_create_form' => '1',
      'on_update_form' => '1',
      'label' => 'El tipo',
      'testData' => '\'accrual\'',
      'testDataUpdate' => '\'deduction\'',
      'validation_rules' => '',
    ),
    3 => 
    array (
      'name' => 'is_wage',
      'type' => 'tinyint',
      'required' => '1',
      'defValue' => '0',
      'key' => '',
      'maxLength' => '1',
      'namespace' => '',
      'relation' => '',
      'fillable' => '1',
      'on_index_table' => '1',
      'on_create_form' => '1',
      'on_update_form' => '1',
      'label' => 'Es salarial?',
      'testData' => 'true',
      'testDataUpdate' => 'false',
      'validation_rules' => '',
    ),
    4 => 
    array (
      'name' => 'apply_1393_law',
      'type' => 'tinyint',
      'required' => '1',
      'defValue' => '0',
      'key' => '',
      'maxLength' => '1',
      'namespace' => '',
      'relation' => '',
      'fillable' => '1',
      'on_create_form' => '1',
      'on_update_form' => '1',
      'label' => 'Ley 1393?',
      'testData' => 'true',
      'testDataUpdate' => 'false',
      'validation_rules' => '',
    ),
    5 => 
    array (
      'name' => 'retention',
      'type' => 'tinyint',
      'required' => '1',
      'defValue' => '0',
      'key' => '',
      'maxLength' => '1',
      'namespace' => '',
      'relation' => '',
      'fillable' => '1',
      'on_create_form' => '1',
      'on_update_form' => '1',
      'label' => 'Retención',
      'testData' => 'true',
      'testDataUpdate' => 'false',
      'validation_rules' => '',
    ),
    6 => 
    array (
      'name' => 'ibc_health',
      'type' => 'tinyint',
      'required' => '1',
      'defValue' => '0',
      'key' => '',
      'maxLength' => '1',
      'namespace' => '',
      'relation' => '',
      'fillable' => '1',
      'on_create_form' => '1',
      'on_update_form' => '1',
      'label' => 'IBC salud',
      'testData' => 'true',
      'testDataUpdate' => 'false',
      'validation_rules' => '',
    ),
    7 => 
    array (
      'name' => 'ibc_pension',
      'type' => 'tinyint',
      'required' => '1',
      'defValue' => '0',
      'key' => '',
      'maxLength' => '1',
      'namespace' => '',
      'relation' => '',
      'fillable' => '1',
      'on_create_form' => '1',
      'on_update_form' => '1',
      'label' => 'IBC pensión',
      'testData' => 'true',
      'testDataUpdate' => 'false',
      'validation_rules' => '',
    ),
    8 => 
    array (
      'name' => 'ibc_arl',
      'type' => 'tinyint',
      'required' => '1',
      'defValue' => '0',
      'key' => '',
      'maxLength' => '1',
      'namespace' => '',
      'relation' => '',
      'fillable' => '1',
      'on_create_form' => '1',
      'on_update_form' => '1',
      'label' => 'IBC ARL',
      'testData' => 'true',
      'testDataUpdate' => 'false',
      'validation_rules' => '',
    ),
    9 => 
    array (
      'name' => 'ccf_base',
      'type' => 'tinyint',
      'required' => '1',
      'defValue' => '0',
      'key' => '',
      'maxLength' => '1',
      'namespace' => '',
      'relation' => '',
      'fillable' => '1',
      'on_create_form' => '1',
      'on_update_form' => '1',
      'label' => 'Base para CCF',
      'testData' => 'true',
      'testDataUpdate' => 'false',
      'validation_rules' => '',
    ),
    10 => 
    array (
      'name' => 'sena_base',
      'type' => 'tinyint',
      'required' => '1',
      'defValue' => '0',
      'key' => '',
      'maxLength' => '1',
      'namespace' => '',
      'relation' => '',
      'fillable' => '1',
      'on_create_form' => '1',
      'on_update_form' => '1',
      'label' => 'Base para SENA',
      'testData' => 'true',
      'testDataUpdate' => 'false',
      'validation_rules' => '',
    ),
    11 => 
    array (
      'name' => 'icbf_base',
      'type' => 'tinyint',
      'required' => '1',
      'defValue' => '0',
      'key' => '',
      'maxLength' => '1',
      'namespace' => '',
      'relation' => '',
      'fillable' => '1',
      'on_create_form' => '1',
      'on_update_form' => '1',
      'label' => 'Base para ICBF',
      'testData' => 'true',
      'testDataUpdate' => 'false',
      'validation_rules' => '',
    ),
    12 => 
    array (
      'name' => 'severance_base',
      'type' => 'tinyint',
      'required' => '1',
      'defValue' => '0',
      'key' => '',
      'maxLength' => '1',
      'namespace' => '',
      'relation' => '',
      'fillable' => '1',
      'on_create_form' => '1',
      'on_update_form' => '1',
      'label' => 'Base para cesantías',
      'testData' => 'true',
      'testDataUpdate' => 'false',
      'validation_rules' => '',
    ),
    13 => 
    array (
      'name' => 'premium_base',
      'type' => 'tinyint',
      'required' => '1',
      'defValue' => '0',
      'key' => '',
      'maxLength' => '1',
      'namespace' => '',
      'relation' => '',
      'fillable' => '1',
      'on_create_form' => '1',
      'on_update_form' => '1',
      'label' => 'Base para prima',
      'testData' => 'true',
      'testDataUpdate' => 'false',
      'validation_rules' => '',
    ),
    14 => 
    array (
      'name' => 'provisioning_holiday',
      'type' => 'tinyint',
      'required' => '1',
      'defValue' => '0',
      'key' => '',
      'maxLength' => '1',
      'namespace' => '',
      'relation' => '',
      'fillable' => '1',
      'on_create_form' => '1',
      'on_update_form' => '1',
      'label' => 'Provisión vacaciones',
      'testData' => 'true',
      'testDataUpdate' => 'false',
      'validation_rules' => '',
    ),
    15 => 
    array (
      'name' => 'money_holiday_base',
      'type' => 'tinyint',
      'required' => '1',
      'defValue' => '0',
      'key' => '',
      'maxLength' => '1',
      'namespace' => '',
      'relation' => '',
      'fillable' => '1',
      'on_create_form' => '1',
      'on_update_form' => '1',
      'label' => 'Dinero vacaciones',
      'testData' => 'true',
      'testDataUpdate' => 'false',
      'validation_rules' => '',
    ),
    16 => 
    array (
      'name' => 'holidays_enjoyed',
      'type' => 'tinyint',
      'required' => '1',
      'defValue' => '0',
      'key' => '',
      'maxLength' => '1',
      'namespace' => '',
      'relation' => '',
      'fillable' => '1',
      'on_create_form' => '1',
      'on_update_form' => '1',
      'label' => 'Vacaciones disfrutadas',
      'testData' => 'true',
      'testDataUpdate' => 'false',
      'validation_rules' => '',
    ),
    17 => 
    array (
      'name' => 'holiday_contract_settlement',
      'type' => 'tinyint',
      'required' => '1',
      'defValue' => '0',
      'key' => '',
      'maxLength' => '1',
      'namespace' => '',
      'relation' => '',
      'fillable' => '1',
      'on_create_form' => '1',
      'on_update_form' => '1',
      'label' => 'Vacaciones liquidación contrato',
      'testData' => 'true',
      'testDataUpdate' => 'false',
      'validation_rules' => '',
    ),
    18 => 
    array (
      'name' => 'indemnity',
      'type' => 'tinyint',
      'required' => '1',
      'defValue' => '0',
      'key' => '',
      'maxLength' => '1',
      'namespace' => '',
      'relation' => '',
      'fillable' => '1',
      'on_create_form' => '1',
      'on_update_form' => '1',
      'label' => 'Indemnización',
      'testData' => 'true',
      'testDataUpdate' => 'false',
      'validation_rules' => '',
    ),
  ),
);