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
use App\Models\Employee;
use llstarscreamll\Core\Traits\FormRequestBasicSetup;

class EmployeeRequest extends FormRequest
{
    use FormRequestBasicSetup;

    /**
     * @var App\Models\Employee
     */
    private $employee;

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
        'employees.store' => 'employees.create',
        'employees.update' => 'employees.edit',
    ];

    /**
     * Ruta de acceso a ficheros de lengaje de mensajes de validación.
     *
     * @var string
     */
    private $messagesLangPath = 'employee.messages';

    /**
     * Ruta de acceso a ficheros de lengaje de nombres de atributos de validación.
     *
     * @var string
     */
    private $attributesLangPath = 'employee.attributes';

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
        $this->employee = new Employee;
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
            $this->prefix.'.dni' => ['numeric'],
            $this->prefix.'.name' => ['string'],
            $this->prefix.'.lastname' => ['string'],
            $this->prefix.'.branch_id' => ['array', 'exists:branches,id'],
            $this->prefix.'.contract_type.*' => ['in:'.$this->employee->getEnumValuesString('contract_type')],
            $this->prefix.'.salary' => ['numeric'],
            $this->prefix.'.salary_type.*' => ['in:'.$this->employee->getEnumValuesString('salary_type')],
            $this->prefix.'.occupational_risk_level.*' => ['in:'.$this->employee->getEnumValuesString('occupational_risk_level')],
            $this->prefix.'.employee_taxpayer_type_id' => ['array', 'exists:employee_taxpayer_types,id'],
            $this->prefix.'.dependents_deduction' => ['numeric'],
            $this->prefix.'.average_EPS_contributions_last_year' => ['numeric'],
            $this->prefix.'.home_interest_deduction_last_year' => ['numeric'],
            $this->prefix.'.prepaid_medicine' => ['numeric'],
            $this->prefix.'.applay_2090_decree_true' => ['boolean'],
            $this->prefix.'.applay_2090_decree_false' => ['boolean'],
            $this->prefix.'.contributor_subtype_true' => ['boolean'],
            $this->prefix.'.contributor_subtype_false' => ['boolean'],
            $this->prefix.'.admitted_at.from' => ['date_format:Y-m-d'],
            $this->prefix.'.admitted_at.to' => ['date_format:Y-m-d'],
            $this->prefix.'.egressed_at.from' => ['date_format:Y-m-d'],
            $this->prefix.'.egressed_at.to' => ['date_format:Y-m-d'],
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
            'dni' => ['required', 'numeric'],
            'name' => ['required', 'string'],
            'lastname' => ['required', 'string'],
            'branch_id' => ['required', 'exists:branches,id'],
            'contract_type' => ['required', 'in:'.$this->employee->getEnumValuesString('contract_type')],
            'salary' => ['required', 'numeric'],
            'salary_type' => ['required', 'in:'.$this->employee->getEnumValuesString('salary_type')],
            'occupational_risk_level' => ['required', 'in:'.$this->employee->getEnumValuesString('occupational_risk_level')],
            'employee_taxpayer_type_id' => ['required', 'exists:employee_taxpayer_types,id'],
            'dependents_deduction' => ['numeric'],
            'average_EPS_contributions_last_year' => ['numeric'],
            'home_interest_deduction_last_year' => ['numeric'],
            'prepaid_medicine' => ['numeric'],
            'applay_2090_decree' => ['boolean'],
            'contributor_subtype' => ['boolean'],
            'admitted_at' => ['date_format:Y-m-d'],
            'egressed_at' => ['date_format:Y-m-d'],
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
            'dni' => ['required', 'numeric'],
            'name' => ['required', 'string'],
            'lastname' => ['required', 'string'],
            'branch_id' => ['required', 'exists:branches,id'],
            'contract_type' => ['required', 'in:'.$this->employee->getEnumValuesString('contract_type')],
            'salary' => ['required', 'numeric'],
            'salary_type' => ['required', 'in:'.$this->employee->getEnumValuesString('salary_type')],
            'occupational_risk_level' => ['required', 'in:'.$this->employee->getEnumValuesString('occupational_risk_level')],
            'employee_taxpayer_type_id' => ['required', 'exists:employee_taxpayer_types,id'],
            'dependents_deduction' => ['numeric'],
            'average_EPS_contributions_last_year' => ['numeric'],
            'home_interest_deduction_last_year' => ['numeric'],
            'prepaid_medicine' => ['numeric'],
            'applay_2090_decree' => ['boolean'],
            'contributor_subtype' => ['boolean'],
            'admitted_at' => ['date_format:Y-m-d'],
            'egressed_at' => ['date_format:Y-m-d'],
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
