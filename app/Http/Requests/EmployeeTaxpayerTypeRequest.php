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
use App\Models\EmployeeTaxpayerType;
use llstarscreamll\Core\Traits\FormRequestBasicSetup;

class EmployeeTaxpayerTypeRequest extends FormRequest
{
    use FormRequestBasicSetup;

    /**
     * @var App\Models\EmployeeTaxpayerType
     */
    private $employeeTaxpayerType;

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
        'employee-taxpayer-types.store' => 'employee-taxpayer-types.create',
        'employee-taxpayer-types.update' => 'employee-taxpayer-types.edit',
    ];

    /**
     * Ruta de acceso a ficheros de lengaje de mensajes de validación.
     *
     * @var string
     */
    private $messagesLangPath = 'employeeTaxpayerType.messages';

    /**
     * Ruta de acceso a ficheros de lengaje de nombres de atributos de validación.
     *
     * @var string
     */
    private $attributesLangPath = 'employeeTaxpayerType.attributes';

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
