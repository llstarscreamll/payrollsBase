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
use App\Models\UserConcept;
use llstarscreamll\Core\Traits\FormRequestBasicSetup;

class UserConceptRequest extends FormRequest
{
    use FormRequestBasicSetup;

    /**
     * @var App\Models\UserConcept
     */
    private $userConcept;

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
        'user-concepts.store' => 'user-concepts.create',
        'user-concepts.update' => 'user-concepts.edit',
    ];

    /**
     * Ruta de acceso a ficheros de lengaje de mensajes de validación.
     *
     * @var string
     */
    private $messagesLangPath = 'userConcept.messages';

    /**
     * Ruta de acceso a ficheros de lengaje de nombres de atributos de validación.
     *
     * @var string
     */
    private $attributesLangPath = 'userConcept.attributes';

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
        $this->userConcept = new UserConcept;
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
            $this->prefix.'.type.*' => ['in:'.$this->userConcept->getEnumValuesString('type')],
            $this->prefix.'.is_wage_true' => ['boolean'],
            $this->prefix.'.is_wage_false' => ['boolean'],
            $this->prefix.'.apply_1393_law_true' => ['boolean'],
            $this->prefix.'.apply_1393_law_false' => ['boolean'],
            $this->prefix.'.retention_true' => ['boolean'],
            $this->prefix.'.retention_false' => ['boolean'],
            $this->prefix.'.ibc_health_true' => ['boolean'],
            $this->prefix.'.ibc_health_false' => ['boolean'],
            $this->prefix.'.ibc_pension_true' => ['boolean'],
            $this->prefix.'.ibc_pension_false' => ['boolean'],
            $this->prefix.'.ibc_arl_true' => ['boolean'],
            $this->prefix.'.ibc_arl_false' => ['boolean'],
            $this->prefix.'.ccf_base_true' => ['boolean'],
            $this->prefix.'.ccf_base_false' => ['boolean'],
            $this->prefix.'.sena_base_true' => ['boolean'],
            $this->prefix.'.sena_base_false' => ['boolean'],
            $this->prefix.'.icbf_base_true' => ['boolean'],
            $this->prefix.'.icbf_base_false' => ['boolean'],
            $this->prefix.'.severance_base_true' => ['boolean'],
            $this->prefix.'.severance_base_false' => ['boolean'],
            $this->prefix.'.premium_base_true' => ['boolean'],
            $this->prefix.'.premium_base_false' => ['boolean'],
            $this->prefix.'.provisioning_holiday_true' => ['boolean'],
            $this->prefix.'.provisioning_holiday_false' => ['boolean'],
            $this->prefix.'.money_holiday_base_true' => ['boolean'],
            $this->prefix.'.money_holiday_base_false' => ['boolean'],
            $this->prefix.'.holidays_enjoyed_true' => ['boolean'],
            $this->prefix.'.holidays_enjoyed_false' => ['boolean'],
            $this->prefix.'.holiday_contract_settlement_true' => ['boolean'],
            $this->prefix.'.holiday_contract_settlement_false' => ['boolean'],
            $this->prefix.'.indemnity_true' => ['boolean'],
            $this->prefix.'.indemnity_false' => ['boolean'],
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
            'type' => ['required', 'in:'.$this->userConcept->getEnumValuesString('type')],
            'is_wage' => ['boolean'],
            'apply_1393_law' => ['boolean'],
            'retention' => ['boolean'],
            'ibc_health' => ['boolean'],
            'ibc_pension' => ['boolean'],
            'ibc_arl' => ['boolean'],
            'ccf_base' => ['boolean'],
            'sena_base' => ['boolean'],
            'icbf_base' => ['boolean'],
            'severance_base' => ['boolean'],
            'premium_base' => ['boolean'],
            'provisioning_holiday' => ['boolean'],
            'money_holiday_base' => ['boolean'],
            'holidays_enjoyed' => ['boolean'],
            'holiday_contract_settlement' => ['boolean'],
            'indemnity' => ['boolean'],
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
            'type' => ['required', 'in:'.$this->userConcept->getEnumValuesString('type')],
            'is_wage' => ['boolean'],
            'apply_1393_law' => ['boolean'],
            'retention' => ['boolean'],
            'ibc_health' => ['boolean'],
            'ibc_pension' => ['boolean'],
            'ibc_arl' => ['boolean'],
            'ccf_base' => ['boolean'],
            'sena_base' => ['boolean'],
            'icbf_base' => ['boolean'],
            'severance_base' => ['boolean'],
            'premium_base' => ['boolean'],
            'provisioning_holiday' => ['boolean'],
            'money_holiday_base' => ['boolean'],
            'holidays_enjoyed' => ['boolean'],
            'holiday_contract_settlement' => ['boolean'],
            'indemnity' => ['boolean'],
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
