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

namespace Page\Functional\IdentityCardTypes;

use FunctionalTester;

class Edit extends Index
{
    /**
     * El link de acceso a la edición del registro.
     *
     * @var  array
     */
    public static $linkToEdit = 'Editar';
    public static $linkToEditElem = 'a.btn.btn-warning';
    
    /**
     * El título de la página.
     *
     * @var  string
     */
    public static $title = 'Editar';

    /**
     * El selector del formulario de edición.
     *
     * @var  string
     */
    public static $form = 'form[name=edit-identity-card-types-form]';

    /**
     * Mensaje de éxito al actualizar un registro.
     *
     * @var  array
     */
    public static $msgSuccess = 'Tipo de Documento de Identificación actualizado correctamente.';
    public static $msgSuccessElem = '.alert.alert-success';

    public function __construct(FunctionalTester $I)
    {
        parent::__construct($I);
    }

    /**
     * Devuelve array con los datos que deben estar presentes en el formulario
     * de edición antes de la operación de actualización.
     *
     * @return  array
     */
    public static function getUpdateFormData()
    {
        $data = array();

        foreach (static::$identityCardTypeData as $key => $value) {
            if (in_array($key, static::$editFormFields)) {
                $data[$key] = $value;
            }
            if (in_array($key, static::$fieldsThatRequieresConfirmation)){
                $data[$key.'_confirmation'] = '';
            }
        }

        return $data;
    }

    /**
     * Devuelve array con datos para actualización de registro en formulario de
     * edición.
     *
     * @return  array
     */
    public static function getDataToUpdateForm()
    {
        $data = array();

        $data = [
            'name' => 'Tarjeta de Identidad',
            'short_name' => 'TI',
        ];

        return $data;
    }

    /**
     * Obtiene array de datos del registro actualizado para comprobarlos en la
     * vista de sólo lectura (show).
     *
     * @return    array
     */
    public static function getUpdatedDataToShowForm()
    {
        $data = static::getDataToUpdateForm();

        // los campos ocultos no deben ser mostrados en la vista de sólo lectura
        foreach (static::$hiddenFields as $key => $value) {
            unset($data[$value]);
            if (in_array($key, static::$fieldsThatRequieresConfirmation)) {
                unset($data[$value.'_confirmation']);
            }
        }

        return $data;
    }
}