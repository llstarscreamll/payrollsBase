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

namespace Page\Functional\Employees;

use FunctionalTester;
use App\Models\Branch;
use App\Models\EmployeeTaxpayerType;

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
    public static $form = 'form[name=edit-employees-form]';

    /**
     * Mensaje de éxito al actualizar un registro.
     *
     * @var  array
     */
    public static $msgSuccess = 'Empleado actualizado correctamente.';
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

        foreach (static::$employeeData as $key => $value) {
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
            'dni' => 987645312,
            'name' => 'Jane',
            'lastname' => 'Doe Doe',
            'branch_id' => Branch::all(['id'])->last()->id,
            'contract_type' => 'F',
            'salary' => 25000000,
            'salary_type' => 'I',
            'occupational_risk_level' => 'IV',
            'employee_taxpayer_type_id' => EmployeeTaxpayerType::all(['id'])->last()->id,
            'dependents_deduction' => 800000,
            'average_EPS_contributions_last_year' => 1500000,
            'home_interest_deduction_last_year' => "",
            'prepaid_medicine' => 250000,
            'applay_2090_decree' => '0',
            'contributor_subtype' => '0',
            'admitted_at' => 2005-05-05,
            'egressed_at' => 2007-07-07,
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