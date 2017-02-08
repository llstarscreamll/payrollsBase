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

namespace App\Http\Requests;

use Illuminate\Http\Response;
use Illuminate\Foundation\Http\FormRequest;
use App\Models\Company;
use llstarscreamll\Core\Traits\FormRequestBasicSetup;

class CompanyRequest extends FormRequest
{
    use FormRequestBasicSetup;

    /**
     * @var App\Models\Company
     */
    private $company;

    /**
     * El prefijo para los campos de búsqueda.
     *
     * @var string
     */
    private $prefix;

    /**
     * @var array
     */
    private $routesAuthMap = [
        'companies.store' => 'companies.create',
        'companies.update' => 'companies.edit',
    ];

    /**
     * Ruta de acceso a ficheros de lengaje de mensajes de validación.
     *
     * @var string
     */
    private $messagesLangPath = 'company.messages';

    /**
     * Ruta de acceso a ficheros de lengaje de nombres de atributos de validación.
     *
     * @var string
     */
    private $attributesLangPath = 'company.attributes';

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $route = $this->route()->getName();

        $permission = isset($this->routesAuthMap[$route])
            ? $this->routesAuthMap[$route]
            : $route;

        return auth()->user()->can($permission);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $this->prefix = config('modules.core.app.search-fields-prefix', 'search');
        
        list($controller, $method) = explode("@", $this->route()->getActionName());
        $method = $method.'Rules';

        return $this->{$method}();
    }

    /**
     * Las reglas de validación para el método index.
     *
     * @return array
     */
    private function indexRules()
    {
        return [
            $this->prefix.'.id' => ['array'],
            $this->prefix.'.name' => ['string'],
            $this->prefix.'.identity_card_type_id' => ['array', 'exists:identity_card_types,id'],
            $this->prefix.'.contributor_identity_card_number' => ['numeric'],
            $this->prefix.'.verification_digit' => ['numeric'],
            $this->prefix.'.legal_company_nature_id' => ['array', 'exists:legal_company_natures,id'],
            $this->prefix.'.person_type' => ['string'],
            $this->prefix.'.address' => ['string'],
            $this->prefix.'.municipality_id' => ['array', 'exists:municipalities,id'],
            $this->prefix.'.dane_activity_code' => ['string'],
            $this->prefix.'.phone' => ['string'],
            $this->prefix.'.fax' => ['string'],
            $this->prefix.'.email' => ['string'],
            $this->prefix.'.legal_rep_identity_card_type_id' => ['array', 'exists:identity_card_types,id'],
            $this->prefix.'.legal_rep_identity_card_number' => ['numeric'],
            $this->prefix.'.legal_rep_verification_digit' => ['numeric'],
            $this->prefix.'.legal_rep_first_name' => ['string'],
            $this->prefix.'.legal_rep_middle_name' => ['string'],
            $this->prefix.'.legal_rep_first_surname' => ['string'],
            $this->prefix.'.legal_rep_last_surname' => ['string'],
            $this->prefix.'.legal_rep_email' => ['string'],
            $this->prefix.'.contact_first_name' => ['string'],
            $this->prefix.'.contact_last_name' => ['string'],
            $this->prefix.'.contact_cell_phone' => ['string'],
            $this->prefix.'.contact_email' => ['string'],
            $this->prefix.'.contributor_class_id' => ['array', 'exists:contributor_classes,id'],
            $this->prefix.'.presentation_form' => ['string'],
            $this->prefix.'.contributor_type_id' => ['array', 'exists:contributor_types,id'],
            $this->prefix.'.payroll_type_id' => ['array', 'exists:payroll_types,id'],
            $this->prefix.'.arl_company_id' => ['array', 'exists:arl_companies,id'],
            $this->prefix.'.arl_department_id' => ['array', 'exists:departments,id'],
            $this->prefix.'.law_1429_from_2010_true' => ['boolean'],
            $this->prefix.'.law_1429_from_2010_false' => ['boolean'],
            $this->prefix.'.law_1607_from_2012_true' => ['boolean'],
            $this->prefix.'.law_1607_from_2012_false' => ['boolean'],
            $this->prefix.'.commercial_registration_date.from' => ['date_format:Y-m-d'],
            $this->prefix.'.commercial_registration_date.to' => ['date_format:Y-m-d'],
            $this->prefix.'.payment_method' => ['string'],
            $this->prefix.'.bank_id' => ['array', 'exists:banks,id'],
            $this->prefix.'.bank_account_type' => ['string'],
            $this->prefix.'.bank_account_number' => ['string'],
            $this->prefix.'.payment_frequency' => ['string'],
            $this->prefix.'.pila_payment_operator_id' => ['array', 'exists:pila_payment_operators,id'],
            $this->prefix.'.sort' => ['string'],
        ];
    }

    /**
     * Las reglas de validación para el método store.
     *
     * @return array
     */
    private function storeRules()
    {
        return [
            'id' => [],
            'name' => ['required', 'string'],
            'identity_card_type_id' => ['required', 'exists:identity_card_types,id'],
            'contributor_identity_card_number' => ['required', 'numeric'],
            'verification_digit' => ['numeric'],
            'legal_company_nature_id' => ['required', 'exists:legal_company_natures,id'],
            'person_type' => ['required', 'string'],
            'address' => ['required', 'string'],
            'municipality_id' => ['required', 'exists:municipalities,id'],
            'dane_activity_code' => ['required', 'string'],
            'phone' => ['required', 'string'],
            'fax' => ['required', 'string'],
            'email' => ['required', 'string'],
            'legal_rep_identity_card_type_id' => ['required', 'exists:identity_card_types,id'],
            'legal_rep_identity_card_number' => ['required', 'numeric'],
            'legal_rep_verification_digit' => ['numeric'],
            'legal_rep_first_name' => ['required', 'string'],
            'legal_rep_middle_name' => ['required', 'string'],
            'legal_rep_first_surname' => ['required', 'string'],
            'legal_rep_last_surname' => ['required', 'string'],
            'legal_rep_email' => ['required', 'string'],
            'contact_first_name' => ['required', 'string'],
            'contact_last_name' => ['required', 'string'],
            'contact_cell_phone' => ['required', 'string'],
            'contact_email' => ['required', 'string'],
            'contributor_class_id' => ['required', 'exists:contributor_classes,id'],
            'presentation_form' => ['required', 'string'],
            'contributor_type_id' => ['required', 'exists:contributor_types,id'],
            'payroll_type_id' => ['required', 'exists:payroll_types,id'],
            'arl_company_id' => ['required', 'exists:arl_companies,id'],
            'arl_department_id' => ['required', 'exists:departments,id'],
            'law_1429_from_2010' => ['boolean'],
            'law_1607_from_2012' => ['boolean'],
            'commercial_registration_date' => ['date_format:Y-m-d'],
            'payment_method' => ['required', 'string'],
            'bank_id' => ['required', 'exists:banks,id'],
            'bank_account_type' => ['required', 'string'],
            'bank_account_number' => ['required', 'string'],
            'payment_frequency' => ['required', 'string'],
            'pila_payment_operator_id' => ['required', 'exists:pila_payment_operators,id'],
        ];
    }

    /**
     * Las reglas de validación para el método update.
     *
     * @return array
     */
    private function updateRules()
    {
        $rules = [
            'id' => [],
            'name' => ['required', 'string'],
            'identity_card_type_id' => ['required', 'exists:identity_card_types,id'],
            'contributor_identity_card_number' => ['required', 'numeric'],
            'verification_digit' => ['numeric'],
            'legal_company_nature_id' => ['required', 'exists:legal_company_natures,id'],
            'person_type' => ['required', 'string'],
            'address' => ['required', 'string'],
            'municipality_id' => ['required', 'exists:municipalities,id'],
            'dane_activity_code' => ['required', 'string'],
            'phone' => ['required', 'string'],
            'fax' => ['required', 'string'],
            'email' => ['required', 'string'],
            'legal_rep_identity_card_type_id' => ['required', 'exists:identity_card_types,id'],
            'legal_rep_identity_card_number' => ['required', 'numeric'],
            'legal_rep_verification_digit' => ['numeric'],
            'legal_rep_first_name' => ['required', 'string'],
            'legal_rep_middle_name' => ['required', 'string'],
            'legal_rep_first_surname' => ['required', 'string'],
            'legal_rep_last_surname' => ['required', 'string'],
            'legal_rep_email' => ['required', 'string'],
            'contact_first_name' => ['required', 'string'],
            'contact_last_name' => ['required', 'string'],
            'contact_cell_phone' => ['required', 'string'],
            'contact_email' => ['required', 'string'],
            'contributor_class_id' => ['required', 'exists:contributor_classes,id'],
            'presentation_form' => ['required', 'string'],
            'contributor_type_id' => ['required', 'exists:contributor_types,id'],
            'payroll_type_id' => ['required', 'exists:payroll_types,id'],
            'arl_company_id' => ['required', 'exists:arl_companies,id'],
            'arl_department_id' => ['required', 'exists:departments,id'],
            'law_1429_from_2010' => ['boolean'],
            'law_1607_from_2012' => ['boolean'],
            'commercial_registration_date' => ['date_format:Y-m-d'],
            'payment_method' => ['required', 'string'],
            'bank_id' => ['required', 'exists:banks,id'],
            'bank_account_type' => ['required', 'string'],
            'bank_account_number' => ['required', 'string'],
            'payment_frequency' => ['required', 'string'],
            'pila_payment_operator_id' => ['required', 'exists:pila_payment_operators,id'],
        ];

        return $rules;
    }

    /**
     * Las reglas de validación para el método destroy.
     *
     * @return array
     */
    private function destroyRules()
    {
        return [
            'id' => ['array'],
            'id.*' => ['numeric'],
        ];
    }
}
