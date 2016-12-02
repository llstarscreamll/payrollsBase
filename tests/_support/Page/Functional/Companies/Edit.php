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

namespace Page\Functional\Companies;

use FunctionalTester;
use App\Models\IdentityCardType;
use App\Models\CompanyTaxpayerType;
use App\Models\LegalCompanyNature;
use App\Models\LegalPersonNature;
use App\Models\Municipality;

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
            'name' => "",
            'identity_card_type_id' => IdentityCardType::all(['id'])->last()->id,
            'contributor_identity_card_number' => "",
            'verification_digit' => "",
            'company_taxpayer_type_id' => CompanyTaxpayerType::all(['id'])->last()->id,
            'legal_company_nature_id' => LegalCompanyNature::all(['id'])->last()->id,
            'legal_person_nature_id' => LegalPersonNature::all(['id'])->last()->id,
            'has_branches' => true,
            'applay_1607_law' => true,
            'applay_1429_law' => true,
            'founded_at' => '1995-05-05',
            'address' => 'carrera 4 #5-6',
            'municipality_id' => Municipality::all(['id'])->last()->id,
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