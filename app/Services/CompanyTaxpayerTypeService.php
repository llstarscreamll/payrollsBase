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

use App\Http\Requests\CompanyTaxpayerTypeRequest;
use App\Repositories\Contracts\CompanyTaxpayerTypeRepository;
use App\Models\CompanyTaxpayerType;
use Illuminate\Support\Collection;

/**
 * Clase CompanyTaxpayerTypeService
 *
 * @author Johan Alvarez <llstarscreamll@hotmail.com>
 */
class CompanyTaxpayerTypeService
{
    /**
     * @var App\Repositories\Contracts\CompanyTaxpayerTypeRepository
     */
    private $companyTaxpayerTypeRepository;

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
     * @param App\Repositories\Contracts\CompanyTaxpayerTypeRepository $companyTaxpayerTypeRepository
     */
    public function __construct(CompanyTaxpayerTypeRepository $companyTaxpayerTypeRepository)
    {
        $this->companyTaxpayerTypeRepository = $companyTaxpayerTypeRepository;
    }

    /**
     * Obtiene datos de consulta predeterminada o lo que indique el usuario de
     * la entidad para la vista Index.
     *
     * @param  App\Http\Requests\CompanyTaxpayerTypeRequest  $request
     *
     * @return Illuminate\Pagination\LengthAwarePaginator
     */
    public function indexSearch(CompanyTaxpayerTypeRequest $request)
    {
        $search = collect($request->get('search'));
        return $this->companyTaxpayerTypeRepository
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
     * @param  App\Http\Requests\CompanyTaxpayerTypeRequest  $request
     *
     * @return array
     */
    public function getIndexTableData(CompanyTaxpayerTypeRequest $request)
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
        $companyTaxpayerType = $this->companyTaxpayerTypeRepository->find($id);
        $data['companyTaxpayerType'] = $companyTaxpayerType;
    
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
        $data['companyTaxpayerType'] = $this->companyTaxpayerTypeRepository->find($id);
        $data += $this->getCreateFormData();
        
        return $data;
    }

    /**
     * Guarda en base de datos nuevo registro de Tipo de Aportante.
     *
     * @param  App\Http\Requests\CompanyTaxpayerTypeRequest  $request
     *
     * @return App\Models\CompanyTaxpayerType
     */
    public function store(CompanyTaxpayerTypeRequest $request)
    {
        $input = null_empty_fields($request->all());
        $companyTaxpayerType = $this->companyTaxpayerTypeRepository->create($input);
        session()->flash('success', trans('companyTaxpayerType.store_company_taxpayer_type_success'));

        return $companyTaxpayerType;
    }

    /**
     * Realiza actualización de Tipo de Aportante.
     *
     * @param  int  $id
     * @param  App\Http\Requests\CompanyTaxpayerTypeRequest  $request
     *
     * @return  App\Models\CompanyTaxpayerType
     */
    public function update(int $id, CompanyTaxpayerTypeRequest $request)
    {
        $input = null_empty_fields($request->all());
        $companyTaxpayerType = $this->companyTaxpayerTypeRepository->update($input, $id);
        session()->flash(
            'success',
            trans('companyTaxpayerType.update_company_taxpayer_type_success')
        );

        return $companyTaxpayerType;
    }

    /**
     * Realiza acción de eliminar registro de Tipo de Aportante.
     *
     * @param  int  $id
     * @param  App\Http\Requests\CompanyTaxpayerTypeRequest  $request
     */
    public function destroy(int $id, CompanyTaxpayerTypeRequest $request)
    {
        $id = $request->has('id') ? $request->get('id') : $id;

        $this->companyTaxpayerTypeRepository->destroy($id);
        session()->flash(
            'success',
            trans_choice('companyTaxpayerType.destroy_company_taxpayer_type_success', count($id))
        );
    }
}
