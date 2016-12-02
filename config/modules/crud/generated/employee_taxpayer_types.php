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
  'table_name' => 'employee_taxpayer_types',
  'create_permissions' => '1',
  'checkbox_component_on_index_table' => 'iCheck',
  'use_DateTimePicker_on_form_fields' => '1',
  'use_modal_confirmation_on_delete' => '1',
  'UI_theme' => 'Inspinia',
  'plural_entity_name' => 'Tipos de Cotizante',
  'single_entity_name' => 'Tipo de Cotizante',
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
      'testData' => '\'Trabajador dependiente\'',
      'testDataUpdate' => '\'Independiente\'',
      'validation_rules' => '',
    ),
    2 => 
    array (
      'name' => 'created_at',
      'type' => 'timestamp',
      'defValue' => '',
      'key' => '',
      'maxLength' => '0',
      'namespace' => '',
      'relation' => '',
      'label' => 'La fecha de creación',
      'testData' => 'date(\'Y-m-d H:i:s\')',
      'testDataUpdate' => '',
      'validation_rules' => '',
    ),
    3 => 
    array (
      'name' => 'updated_at',
      'type' => 'timestamp',
      'defValue' => '',
      'key' => '',
      'maxLength' => '0',
      'namespace' => '',
      'relation' => '',
      'label' => 'La fecha de actualización',
      'testData' => 'date(\'Y-m-d H:i:s\')',
      'testDataUpdate' => '',
      'validation_rules' => '',
    ),
  ),
);