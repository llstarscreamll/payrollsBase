<?php

/**
 * Este archivo es parte de .
 * (c) Johan Alvarez <llstarscreamll@hotmail.com>
 * Licensed under The MIT License (MIT).
 *
 * @package    
 * @version    0.1
 * @author     Johan Alvarez
 * @license    The MIT License (MIT)
 * @copyright  (c) 2015-2016, Johan Alvarez <llstarscreamll@hotmail.com>
 * @link       https://github.com/llstarscreamll
 */

namespace App\Services;

use App\Http\Requests\DepartmentRequest;
use App\Repositories\Contracts\DepartmentRepository;
use App\Models\Department;
use App\Repositories\Contracts\CountryRepository;
use Illuminate\Support\Collection;

/**
 * Clase DepartmentService
 *
 * @author Johan Alvarez <llstarscreamll@hotmail.com>
 */
class DepartmentService
{
    /**
     * @var App\Repositories\Contracts\DepartmentRepository
     */
    private $departmentRepository;
    
    /**
     * @var App\Repositories\Contracts\CountryRepository
     */
    private $countryRepository;

    /**
     * Las columnas predeterminadas a mostrar en la tabla del Index.
     *
     * @var array
     */
    private $defaultSelectedtableColumns = [
        'country_id',
        'code',
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
     * @param App\Repositories\Contracts\DepartmentRepository $departmentRepository
     * @param App\Repositories\Contracts\CountryRepository $countryRepository
     */
    public function __construct(DepartmentRepository $departmentRepository, CountryRepository $countryRepository)
    {
        $this->departmentRepository = $departmentRepository;
        $this->countryRepository = $countryRepository;
    }

    /**
     * Obtiene datos de consulta predeterminada o lo que indique el usuario de
     * la entidad para la vista Index.
     *
     * @param  App\Http\Requests\DepartmentRequest  $request
     *
     * @return Illuminate\Pagination\LengthAwarePaginator
     */
    public function indexSearch(DepartmentRequest $request)
    {
        $search = collect($request->get('search'));
        return $this->departmentRepository
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
     * @param  App\Http\Requests\DepartmentRequest  $request
     *
     * @return array
     */
    public function getIndexTableData(DepartmentRequest $request)
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
        $data['country_id_list'] = $this->countryRepository->getSelectList();
    
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
        $department = $this->departmentRepository->find($id);
        $data['department'] = $department;
        $data['country_id_list'] = $this->countryRepository->getSelectList(
            'id',
            'name',
            (array) $department->country_id
        );
    
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
        $data['department'] = $this->departmentRepository->find($id);
        $data += $this->getCreateFormData();
        
        return $data;
    }

    /**
     * Guarda en base de datos nuevo registro de .
     *
     * @param  App\Http\Requests\DepartmentRequest  $request
     *
     * @return App\Models\Department
     */
    public function store(DepartmentRequest $request)
    {
        $input = null_empty_fields($request->all());
        $department = $this->departmentRepository->create($input);
        session()->flash('success', trans('department.store_department_success'));

        return $department;
    }

    /**
     * Realiza actualización de .
     *
     * @param  int  $id
     * @param  App\Http\Requests\DepartmentRequest  $request
     *
     * @return  App\Models\Department
     */
    public function update(int $id, DepartmentRequest $request)
    {
        $input = null_empty_fields($request->all());
        $department = $this->departmentRepository->update($input, $id);
        session()->flash(
            'success',
            trans('department.update_department_success')
        );

        return $department;
    }

    /**
     * Realiza acción de eliminar registro de .
     *
     * @param  int  $id
     * @param  App\Http\Requests\DepartmentRequest  $request
     */
    public function destroy(int $id, DepartmentRequest $request)
    {
        $id = $request->has('id') ? $request->get('id') : $id;

        $this->departmentRepository->destroy($id);
        session()->flash(
            'success',
            trans_choice('department.destroy_department_success', count($id))
        );
    }
}
