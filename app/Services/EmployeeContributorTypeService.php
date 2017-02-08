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

namespace App\Services;

use App\Http\Requests\EmployeeContributorTypeRequest;
use App\Repositories\Contracts\EmployeeContributorTypeRepository;
use App\Models\EmployeeContributorType;
use Illuminate\Support\Collection;

/**
 * Clase EmployeeContributorTypeService
 *
 * @author Johan Alvarez <llstarscreamll@hotmail.com>
 */
class EmployeeContributorTypeService
{
    /**
     * @var App\Repositories\Contracts\EmployeeContributorTypeRepository
     */
    private $employeeContributorTypeRepository;

    /**
     * Las columnas predeterminadas a mostrar en la tabla del Index.
     *
     * @var array
     */
    private $defaultSelectedtableColumns = [
        'name',
        'short_name',
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
     * @param App\Repositories\Contracts\EmployeeContributorTypeRepository $employeeContributorTypeRepository
     */
    public function __construct(EmployeeContributorTypeRepository $employeeContributorTypeRepository)
    {
        $this->employeeContributorTypeRepository = $employeeContributorTypeRepository;
    }

    /**
     * Obtiene datos de consulta predeterminada o lo que indique el usuario de
     * la entidad para la vista Index.
     *
     * @param  App\Http\Requests\EmployeeContributorTypeRequest  $request
     *
     * @return Illuminate\Pagination\LengthAwarePaginator
     */
    public function indexSearch(EmployeeContributorTypeRequest $request)
    {
        $search = collect($request->get('search'));
        return $this->employeeContributorTypeRepository
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
     * @param  App\Http\Requests\EmployeeContributorTypeRequest  $request
     *
     * @return array
     */
    public function getIndexTableData(EmployeeContributorTypeRequest $request)
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
        $employeeContributorType = $this->employeeContributorTypeRepository->find($id);
        $data['employeeContributorType'] = $employeeContributorType;
    
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
        $data['employeeContributorType'] = $this->employeeContributorTypeRepository->find($id);
        $data += $this->getCreateFormData();
        
        return $data;
    }

    /**
     * Guarda en base de datos nuevo registro de Tipo de empleado aportante.
     *
     * @param  App\Http\Requests\EmployeeContributorTypeRequest  $request
     *
     * @return App\Models\EmployeeContributorType
     */
    public function store(EmployeeContributorTypeRequest $request)
    {
        $input = null_empty_fields($request->all());
        $employeeContributorType = $this->employeeContributorTypeRepository->create($input);
        session()->flash('success', trans('employeeContributorType.store_employee_contributor_type_success'));

        return $employeeContributorType;
    }

    /**
     * Realiza actualización de Tipo de empleado aportante.
     *
     * @param  int  $id
     * @param  App\Http\Requests\EmployeeContributorTypeRequest  $request
     *
     * @return  App\Models\EmployeeContributorType
     */
    public function update(int $id, EmployeeContributorTypeRequest $request)
    {
        $input = null_empty_fields($request->all());
        $employeeContributorType = $this->employeeContributorTypeRepository->update($input, $id);
        session()->flash(
            'success',
            trans('employeeContributorType.update_employee_contributor_type_success')
        );

        return $employeeContributorType;
    }

    /**
     * Realiza acción de eliminar registro de Tipo de empleado aportante.
     *
     * @param  int  $id
     * @param  App\Http\Requests\EmployeeContributorTypeRequest  $request
     */
    public function destroy(int $id, EmployeeContributorTypeRequest $request)
    {
        $id = $request->has('id') ? $request->get('id') : $id;

        $this->employeeContributorTypeRepository->destroy($id);
        session()->flash(
            'success',
            trans_choice('employeeContributorType.destroy_employee_contributor_type_success', count($id))
        );
    }
}
