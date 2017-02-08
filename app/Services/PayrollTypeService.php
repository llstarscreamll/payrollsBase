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

use App\Http\Requests\PayrollTypeRequest;
use App\Repositories\Contracts\PayrollTypeRepository;
use App\Models\PayrollType;
use Illuminate\Support\Collection;

/**
 * Clase PayrollTypeService
 *
 * @author Johan Alvarez <llstarscreamll@hotmail.com>
 */
class PayrollTypeService
{
    /**
     * @var App\Repositories\Contracts\PayrollTypeRepository
     */
    private $payrollTypeRepository;

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
     * @param App\Repositories\Contracts\PayrollTypeRepository $payrollTypeRepository
     */
    public function __construct(PayrollTypeRepository $payrollTypeRepository)
    {
        $this->payrollTypeRepository = $payrollTypeRepository;
    }

    /**
     * Obtiene datos de consulta predeterminada o lo que indique el usuario de
     * la entidad para la vista Index.
     *
     * @param  App\Http\Requests\PayrollTypeRequest  $request
     *
     * @return Illuminate\Pagination\LengthAwarePaginator
     */
    public function indexSearch(PayrollTypeRequest $request)
    {
        $search = collect($request->get('search'));
        return $this->payrollTypeRepository
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
     * @param  App\Http\Requests\PayrollTypeRequest  $request
     *
     * @return array
     */
    public function getIndexTableData(PayrollTypeRequest $request)
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
        $payrollType = $this->payrollTypeRepository->find($id);
        $data['payrollType'] = $payrollType;
    
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
        $data['payrollType'] = $this->payrollTypeRepository->find($id);
        $data += $this->getCreateFormData();
        
        return $data;
    }

    /**
     * Guarda en base de datos nuevo registro de Tipo de planilla.
     *
     * @param  App\Http\Requests\PayrollTypeRequest  $request
     *
     * @return App\Models\PayrollType
     */
    public function store(PayrollTypeRequest $request)
    {
        $input = null_empty_fields($request->all());
        $payrollType = $this->payrollTypeRepository->create($input);
        session()->flash('success', trans('payrollType.store_payroll_type_success'));

        return $payrollType;
    }

    /**
     * Realiza actualización de Tipo de planilla.
     *
     * @param  int  $id
     * @param  App\Http\Requests\PayrollTypeRequest  $request
     *
     * @return  App\Models\PayrollType
     */
    public function update(int $id, PayrollTypeRequest $request)
    {
        $input = null_empty_fields($request->all());
        $payrollType = $this->payrollTypeRepository->update($input, $id);
        session()->flash(
            'success',
            trans('payrollType.update_payroll_type_success')
        );

        return $payrollType;
    }

    /**
     * Realiza acción de eliminar registro de Tipo de planilla.
     *
     * @param  int  $id
     * @param  App\Http\Requests\PayrollTypeRequest  $request
     */
    public function destroy(int $id, PayrollTypeRequest $request)
    {
        $id = $request->has('id') ? $request->get('id') : $id;

        $this->payrollTypeRepository->destroy($id);
        session()->flash(
            'success',
            trans_choice('payrollType.destroy_payroll_type_success', count($id))
        );
    }
}
