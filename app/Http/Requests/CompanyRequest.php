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
            $this->prefix.'.company_taxpayer_type_id' => ['array', 'exists:company_taxpayer_types,id'],
            $this->prefix.'.legal_company_nature_id' => ['array', 'exists:legal_company_natures,id'],
            $this->prefix.'.legal_person_nature_id' => ['array', 'exists:legal_person_natures,id'],
            $this->prefix.'.has_branches_true' => ['boolean'],
            $this->prefix.'.has_branches_false' => ['boolean'],
            $this->prefix.'.applay_1607_law_true' => ['boolean'],
            $this->prefix.'.applay_1607_law_false' => ['boolean'],
            $this->prefix.'.applay_1429_law_true' => ['boolean'],
            $this->prefix.'.applay_1429_law_false' => ['boolean'],
            $this->prefix.'.founded_at.from' => ['date_format:Y-m-d'],
            $this->prefix.'.founded_at.to' => ['date_format:Y-m-d'],
            $this->prefix.'.address' => ['string'],
            $this->prefix.'.municipality_id' => ['array', 'exists:municipalities,id'],
            $this->prefix.'.created_at.from' => ['date_format:Y-m-d H:i:s'],
            $this->prefix.'.created_at.to' => ['date_format:Y-m-d H:i:s'],
            $this->prefix.'.updated_at.from' => ['date_format:Y-m-d H:i:s'],
            $this->prefix.'.updated_at.to' => ['date_format:Y-m-d H:i:s'],
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
            'verification_digit' => ['required', 'numeric'],
            'company_taxpayer_type_id' => ['required', 'exists:company_taxpayer_types,id'],
            'legal_company_nature_id' => ['required', 'exists:legal_company_natures,id'],
            'legal_person_nature_id' => ['required', 'exists:legal_person_natures,id'],
            'has_branches' => ['boolean'],
            'applay_1607_law' => ['boolean'],
            'applay_1429_law' => ['boolean'],
            'founded_at' => ['required', 'date_format:Y-m-d'],
            'address' => ['required', 'string'],
            'municipality_id' => ['required', 'exists:municipalities,id'],
            'created_at' => ['date_format:Y-m-d H:i:s'],
            'updated_at' => ['date_format:Y-m-d H:i:s'],
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
            'verification_digit' => ['required', 'numeric'],
            'company_taxpayer_type_id' => ['required', 'exists:company_taxpayer_types,id'],
            'legal_company_nature_id' => ['required', 'exists:legal_company_natures,id'],
            'legal_person_nature_id' => ['required', 'exists:legal_person_natures,id'],
            'has_branches' => ['boolean'],
            'applay_1607_law' => ['boolean'],
            'applay_1429_law' => ['boolean'],
            'founded_at' => ['required', 'date_format:Y-m-d'],
            'address' => ['required', 'string'],
            'municipality_id' => ['required', 'exists:municipalities,id'],
            'created_at' => ['date_format:Y-m-d H:i:s'],
            'updated_at' => ['date_format:Y-m-d H:i:s'],
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
