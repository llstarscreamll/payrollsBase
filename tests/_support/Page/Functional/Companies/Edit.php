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

namespace Page\Functional\Companies;

use FunctionalTester;
use App\Models\IdentityCardType;
use App\Models\LegalCompanyNature;
use App\Models\Municipality;
use App\Models\IdentityCardType;
use App\Models\ContributorClass;
use App\Models\ContributorType;
use App\Models\PayrollType;
use App\Models\ArlCompany;
use App\Models\Department;
use App\Models\Bank;
use App\Models\PilaPaymentOperator;

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
    public static $form = 'form[name=edit-companies-form]';

    /**
     * Mensaje de éxito al actualizar un registro.
     *
     * @var  array
     */
    public static $msgSuccess = 'Empresa actualizado correctamente.';
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

        foreach (static::$companyData as $key => $value) {
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
            'name' => 'Acme Corp.',
            'identity_card_type_id' => IdentityCardType::all(['id'])->last()->id,
            'contributor_identity_card_number' => 321,
            'verification_digit' => 2,
            'legal_company_nature_id' => LegalCompanyNature::all(['id'])->last()->id,
            'person_type' => 'Natural',
            'address' => 'carrera 321',
            'municipality_id' => Municipality::all(['id'])->last()->id,
            'dane_activity_code' => 2,
            'phone' => 654321,
            'fax' => 456789,
            'email' => 'acmecorp@acmecorp.com',
            'legal_rep_identity_card_type_id' => IdentityCardType::all(['id'])->last()->id,
            'legal_rep_identity_card_number' => 2,
            'legal_rep_verification_digit' => 2,
            'legal_rep_first_name' => 'Jane',
            'legal_rep_middle_name' => 'Alexa',
            'legal_rep_first_surname' => 'Smith',
            'legal_rep_last_surname' => 'Stevenson',
            'legal_rep_email' => 'jane@example.com',
            'contact_first_name' => 'Vladimir',
            'contact_last_name' => 'Grant',
            'contact_cell_phone' => '52456 123654',
            'contact_email' => 'vladimir@example.com',
            'contributor_class_id' => ContributorClass::all(['id'])->last()->id,
            'presentation_form' => 'sucursal',
            'contributor_type_id' => ContributorType::all(['id'])->last()->id,
            'payroll_type_id' => PayrollType::all(['id'])->last()->id,
            'arl_company_id' => ArlCompany::all(['id'])->last()->id,
            'arl_department_id' => Department::all(['id'])->last()->id,
            'law_1429_from_2010' => true,
            'law_1607_from_2012' => '0',
            'commercial_registration_date' => '2017-01-01',
            'payment_method' => 'Cheque',
            'bank_id' => Bank::all(['id'])->last()->id,
            'bank_account_type' => 'ahorros',
            'bank_account_number' => '987654321',
            'payment_frequency' => 'Quincenal',
            'pila_payment_operator_id' => PilaPaymentOperator::all(['id'])->last()->id,
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