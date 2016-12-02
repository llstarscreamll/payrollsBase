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

use App\Http\Requests\EmployeeRequest;
use App\Repositories\Contracts\EmployeeRepository;
use App\Models\Employee;
use App\Repositories\Contracts\BranchRepository;
use Illuminate\Support\Collection;

/**
 * Clase EmployeeService
 *
 * @author Johan Alvarez <llstarscreamll@hotmail.com>
 */
class EmployeeService
{
    /**
     * @var App\Repositories\Contracts\EmployeeRepository
     */
    private $employeeRepository;
    
    /**
     * @var App\Repositories\Contracts\BranchRepository
     */
    private $branchRepository;

    /**
     * Las columnas predeterminadas a mostrar en la tabla del Index.
     *
     * @var array
     */
    private $defaultSelectedtableColumns = [
        'dni',
        'name',
        'lastname',
        'branch_id',
        'salary',
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
     * @param App\Repositories\Contracts\EmployeeRepository $employeeRepository
     * @param App\Repositories\Contracts\BranchRepository $branchRepository
     */
    public function __construct(EmployeeRepository $employeeRepository, BranchRepository $branchRepository)
    {
        $this->employeeRepository = $employeeRepository;
        $this->branchRepository = $branchRepository;
    }

    /**
     * Obtiene datos de consulta predeterminada o lo que indique el usuario de
     * la entidad para la vista Index.
     *
     * @param  App\Http\Requests\EmployeeRequest  $request
     *
     * @return Illuminate\Pagination\LengthAwarePaginator
     */
    public function indexSearch(EmployeeRequest $request)
    {
        $search = collect($request->get('search'));
        return $this->employeeRepository
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
     * @param  App\Http\Requests\EmployeeRequest  $request
     *
     * @return array
     */
    public function getIndexTableData(EmployeeRequest $request)
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
        $data['branch_id_list'] = $this->branchRepository->getSelectList();
        $data['contributor_type_id_list'] = $this->employeeTaxpayerTypeRepository->getSelectList();
        $data['contract_type_list'] = $this->employeeRepository->getEnumFieldSelectList('contract_type');
        $data['salary_type_list'] = $this->employeeRepository->getEnumFieldSelectList('salary_type');
        $data['occupational_risk_level_list'] = $this->employeeRepository->getEnumFieldSelectList('occupational_risk_level');
    
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
        $employee = $this->employeeRepository->find($id);
        $data['employee'] = $employee;
        $data['branch_id_list'] = $this->branchRepository->getSelectList(
            'id',
            'name',
            (array) $employee->branch_id
        );
        $data['contributor_type_id_list'] = $this->employeeTaxpayerTypeRepository->getSelectList(
            'id',
            'name',
            (array) $employee->contributor_type_id
        );
        $data['contract_type_list'] = $employee->getEnumValuesArray('contract_type');
        $data['salary_type_list'] = $employee->getEnumValuesArray('salary_type');
        $data['occupational_risk_level_list'] = $employee->getEnumValuesArray('occupational_risk_level');
    
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
        $data['employee'] = $this->employeeRepository->find($id);
        $data += $this->getCreateFormData();
        
        return $data;
    }

    /**
     * Guarda en base de datos nuevo registro de Empleado.
     *
     * @param  App\Http\Requests\EmployeeRequest  $request
     *
     * @return App\Models\Employee
     */
    public function store(EmployeeRequest $request)
    {
        $input = null_empty_fields($request->all());
        $employee = $this->employeeRepository->create($input);
        session()->flash('success', trans('employee.store_employee_success'));

        return $employee;
    }

    /**
     * Realiza actualización de Empleado.
     *
     * @param  int  $id
     * @param  App\Http\Requests\EmployeeRequest  $request
     *
     * @return  App\Models\Employee
     */
    public function update(int $id, EmployeeRequest $request)
    {
        $input = null_empty_fields($request->all());
        $employee = $this->employeeRepository->update($input, $id);
        session()->flash(
            'success',
            trans('employee.update_employee_success')
        );

        return $employee;
    }

    /**
     * Realiza acción de eliminar registro de Empleado.
     *
     * @param  int  $id
     * @param  App\Http\Requests\EmployeeRequest  $request
     */
    public function destroy(int $id, EmployeeRequest $request)
    {
        $id = $request->has('id') ? $request->get('id') : $id;

        $this->employeeRepository->destroy($id);
        session()->flash(
            'success',
            trans_choice('employee.destroy_employee_success', count($id))
        );
    }
}
