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

return array (
  'table_name' => 'pila_payment_operators',
  'create_permissions' => '1',
  'checkbox_component_on_index_table' => 'iCheck',
  'use_DateTimePicker_on_form_fields' => '1',
  'use_modal_confirmation_on_delete' => '1',
  'UI_theme' => 'Inspinia',
  'plural_entity_name' => 'Operadores de pago PILA',
  'single_entity_name' => 'Operador de pago PILA',
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
      'testData' => '\'Aportes en línea\'',
      'testDataUpdate' => '\'Compensar\'',
      'validation_rules' => '',
    ),
    2 => 
    array (
      'name' => 'short_name',
      'type' => 'varchar',
      'defValue' => '',
      'key' => '',
      'maxLength' => '255',
      'namespace' => '',
      'relation' => '',
      'fillable' => '1',
      'on_create_form' => '1',
      'on_update_form' => '1',
      'label' => 'El nombre corto',
      'testData' => '\'AEL\'',
      'testDataUpdate' => '\'COM\'',
      'validation_rules' => '',
    ),
    3 => 
    array (
      'name' => 'phone',
      'type' => 'varchar',
      'defValue' => '',
      'key' => '',
      'maxLength' => '255',
      'namespace' => '',
      'relation' => '',
      'fillable' => '1',
      'on_index_table' => '1',
      'on_create_form' => '1',
      'on_update_form' => '1',
      'label' => 'El teléfono',
      'testData' => '\'123456\'',
      'testDataUpdate' => '\'654321\'',
      'validation_rules' => '',
    ),
    4 => 
    array (
      'name' => 'email',
      'type' => 'varchar',
      'defValue' => '',
      'key' => '',
      'maxLength' => '255',
      'namespace' => '',
      'relation' => '',
      'fillable' => '1',
      'on_index_table' => '1',
      'on_create_form' => '1',
      'on_update_form' => '1',
      'label' => 'El correo electrónico',
      'testData' => '\'aportes@aportes.com\'',
      'testDataUpdate' => '\'compensar@compensar.com\'',
      'validation_rules' => '',
    ),
    5 => 
    array (
      'name' => 'website',
      'type' => 'varchar',
      'defValue' => '',
      'key' => '',
      'maxLength' => '255',
      'namespace' => '',
      'relation' => '',
      'fillable' => '1',
      'on_create_form' => '1',
      'on_update_form' => '1',
      'label' => 'El sitio web',
      'testData' => '\'foo.com\'',
      'testDataUpdate' => '\'compensar.com\'',
      'validation_rules' => '',
    ),
  ),
);