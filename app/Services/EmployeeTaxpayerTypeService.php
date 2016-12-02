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

namespace App\Services;

use App\Http\Requests\EmployeeTaxpayerTypeRequest;
use App\Repositories\Contracts\EmployeeTaxpayerTypeRepository;
use App\Models\EmployeeTaxpayerType;
use Illuminate\Support\Collection;

/**
 * Clase EmployeeTaxpayerTypeService
 *
 * @author Johan Alvarez <llstarscreamll@hotmail.com>
 */
class EmployeeTaxpayerTypeService
{
    /**
     * @var App\Repositories\Contracts\EmployeeTaxpayerTypeRepository
     */
    private $employeeTaxpayerTypeRepository;

    /**
     * Las columnas predeterminadas a mostrar en la tabla del Index.
     *
     * @var array
     */
    private $defaultSelectedtableColumns = [
        'name',
    ];

    /**
     * Las columnas o atributos que deben ser consultados de la base de datos,
     * así el usuario no lo especifique.
     *
     * @var array
     */
    private $forceQueryColumns = [
        'id',
    ];

    /**
     * Crea nueva instancia del servicio.
     *
     * @param App\Repositories\Contracts\EmployeeTaxpayerTypeRepository $employeeTaxpayerTypeRepository
     */
    public function __construct(EmployeeTaxpayerTypeRepository $employeeTaxpayerTypeRepository)
    {
        $this->employeeTaxpayerTypeRepository = $employeeTaxpayerTypeRepository;
    }

    /**
     * Obtiene datos de consulta predeterminada o lo que indique el usuario de
     * la entidad para la vista Index.
     *
     * @param  App\Http\Requests\EmployeeTaxpayerTypeRequest  $request
     *
     * @return Illuminate\Pagination\LengthAwarePaginator
     */
    public function indexSearch(EmployeeTaxpayerTypeRequest $request)
    {
        $search = collect($request->get('search'));
        return $this->employeeTaxpayerTypeRepository
            ->getRequested($search, $this->getQueryColumns($search));
    }

    /**
     * Obtienen array de columnas a consultar en la base de datos para la tabla
     * del index.
     *
     * @param  Illuminate\Support\Collection $search
     *
     * @return array
     */
    private function getQueryColumns(Collection $search)
    {
        return array_merge(
            $search->get('table_columns', $this->defaultSelectedtableColumns),
            $this->forceQueryColumns
        );
    }

    /**
     * Obtiene los datos para la vista Index.
     *
     * @param  App\Http\Requests\EmployeeTaxpayerTypeRequest  $request
     *
     * @return array
     */
    public function getIndexTableData(EmployeeTaxpayerTypeRequest $request)
    {
        $search = collect($request->get('search'));

        $data = [];
        $data += $this->getCreateFormData();
        $data['selectedTableColumns'] = $search->get(
            'table_columns',
            $this->defaultSelectedtableColumns
        );

        return $data;
    }

    /**
     * Obtiene los datos para la vista de creación.
     *
     * @return array
     */
    public function getCreateFormData()
    {
        $data = [];
    
        return $data;
    }

    /**
     * Obtiene los datos para la vista de detalles.
     *
     * @param  int  $id
     *
     * @return array
     */
    public function getShowFormData(int $id)
    {
        $data = array();
        $employeeTaxpayerType = $this->employeeTaxpayerTypeRepository->find($id);
        $data['employeeTaxpayerType'] = $employeeTaxpayerType;
    
        return $data;
    }

    /**
     * Obtiene los datos para la vista de edición.
     *
     * @param  int  $id
     *
     * @return array
     */
    public function getEditFormData(int $id)
    {
        $data = array();
        $data['employeeTaxpayerType'] = $this->employeeTaxpayerTypeRepository->find($id);
        $data += $this->getCreateFormData();
        
        return $data;
    }

    /**
     * Guarda en base de datos nuevo registro de Tipo de Cotizante.
     *
     * @param  App\Http\Requests\EmployeeTaxpayerTypeRequest  $request
     *
     * @return App\Models\EmployeeTaxpayerType
     */
    public function store(EmployeeTaxpayerTypeRequest $request)
    {
        $input = null_empty_fields($request->all());
        $employeeTaxpayerType = $this->employeeTaxpayerTypeRepository->create($input);
        session()->flash('success', trans('employeeTaxpayerType.store_employee_taxpayer_type_success'));

        return $employeeTaxpayerType;
    }

    /**
     * Realiza actualización de Tipo de Cotizante.
     *
     * @param  int  $id
     * @param  App\Http\Requests\EmployeeTaxpayerTypeRequest  $request
     *
     * @return  App\Models\EmployeeTaxpayerType
     */
    public function update(int $id, EmployeeTaxpayerTypeRequest $request)
    {
        $input = null_empty_fields($request->all());
        $employeeTaxpayerType = $this->employeeTaxpayerTypeRepository->update($input, $id);
        session()->flash(
            'success',
            trans('employeeTaxpayerType.update_employee_taxpayer_type_success')
        );

        return $employeeTaxpayerType;
    }

    /**
     * Realiza acción de eliminar registro de Tipo de Cotizante.
     *
     * @param  int  $id
     * @param  App\Http\Requests\EmployeeTaxpayerTypeRequest  $request
     */
    public function destroy(int $id, EmployeeTaxpayerTypeRequest $request)
    {
        $id = $request->has('id') ? $request->get('id') : $id;

        $this->employeeTaxpayerTypeRepository->destroy($id);
        session()->flash(
            'success',
            trans_choice('employeeTaxpayerType.destroy_employee_taxpayer_type_success', count($id))
        );
    }
}
