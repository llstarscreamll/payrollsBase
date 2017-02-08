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
use App\Models\BranchOffice;
use llstarscreamll\Core\Traits\FormRequestBasicSetup;

class BranchOfficeRequest extends FormRequest
{
    use FormRequestBasicSetup;

    /**
     * @var App\Models\BranchOffice
     */
    private $branchOffice;

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
        'branch-offices.store' => 'branch-offices.create',
        'branch-offices.update' => 'branch-offices.edit',
    ];

    /**
     * Ruta de acceso a ficheros de lengaje de mensajes de validación.
     *
     * @var string
     */
    private $messagesLangPath = 'branchOffice.messages';

    /**
     * Ruta de acceso a ficheros de lengaje de nombres de atributos de validación.
     *
     * @var string
     */
    private $attributesLangPath = 'branchOffice.attributes';

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
            $this->prefix.'.company_id' => ['array', 'exists:companies,id'],
            $this->prefix.'.name' => ['string'],
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
            'company_id' => ['required', 'exists:companies,id'],
            'name' => ['required', 'string'],
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
            'company_id' => ['required', 'exists:companies,id'],
            'name' => ['required', 'string'],
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
