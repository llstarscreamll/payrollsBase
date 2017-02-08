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

use App\Http\Requests\BranchOfficeRequest;
use App\Repositories\Contracts\BranchOfficeRepository;
use App\Models\BranchOffice;
use App\Repositories\Contracts\CompanyRepository;
use Illuminate\Support\Collection;

/**
 * Clase BranchOfficeService
 *
 * @author Johan Alvarez <llstarscreamll@hotmail.com>
 */
class BranchOfficeService
{
    /**
     * @var App\Repositories\Contracts\BranchOfficeRepository
     */
    private $branchOfficeRepository;
    
    /**
     * @var App\Repositories\Contracts\CompanyRepository
     */
    private $companyRepository;

    /**
     * Las columnas predeterminadas a mostrar en la tabla del Index.
     *
     * @var array
     */
    private $defaultSelectedtableColumns = [
        'company_id',
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
     * @param App\Repositories\Contracts\BranchOfficeRepository $branchOfficeRepository
     * @param App\Repositories\Contracts\CompanyRepository $companyRepository
     */
    public function __construct(BranchOfficeRepository $branchOfficeRepository, CompanyRepository $companyRepository)
    {
        $this->branchOfficeRepository = $branchOfficeRepository;
        $this->companyRepository = $companyRepository;
    }

    /**
     * Obtiene datos de consulta predeterminada o lo que indique el usuario de
     * la entidad para la vista Index.
     *
     * @param  App\Http\Requests\BranchOfficeRequest  $request
     *
     * @return Illuminate\Pagination\LengthAwarePaginator
     */
    public function indexSearch(BranchOfficeRequest $request)
    {
        $search = collect($request->get('search'));
        return $this->branchOfficeRepository
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
     * @param  App\Http\Requests\BranchOfficeRequest  $request
     *
     * @return array
     */
    public function getIndexTableData(BranchOfficeRequest $request)
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
        $data['company_id_list'] = $this->companyRepository->getSelectList();
    
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
        $branchOffice = $this->branchOfficeRepository->find($id);
        $data['branchOffice'] = $branchOffice;
        $data['company_id_list'] = $this->companyRepository->getSelectList(
            'id',
            'name',
            (array) $branchOffice->company_id
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
        $data['branchOffice'] = $this->branchOfficeRepository->find($id);
        $data += $this->getCreateFormData();
        
        return $data;
    }

    /**
     * Guarda en base de datos nuevo registro de Sucursal.
     *
     * @param  App\Http\Requests\BranchOfficeRequest  $request
     *
     * @return App\Models\BranchOffice
     */
    public function store(BranchOfficeRequest $request)
    {
        $input = null_empty_fields($request->all());
        $branchOffice = $this->branchOfficeRepository->create($input);
        session()->flash('success', trans('branchOffice.store_branch_office_success'));

        return $branchOffice;
    }

    /**
     * Realiza actualización de Sucursal.
     *
     * @param  int  $id
     * @param  App\Http\Requests\BranchOfficeRequest  $request
     *
     * @return  App\Models\BranchOffice
     */
    public function update(int $id, BranchOfficeRequest $request)
    {
        $input = null_empty_fields($request->all());
        $branchOffice = $this->branchOfficeRepository->update($input, $id);
        session()->flash(
            'success',
            trans('branchOffice.update_branch_office_success')
        );

        return $branchOffice;
    }

    /**
     * Realiza acción de eliminar registro de Sucursal.
     *
     * @param  int  $id
     * @param  App\Http\Requests\BranchOfficeRequest  $request
     */
    public function destroy(int $id, BranchOfficeRequest $request)
    {
        $id = $request->has('id') ? $request->get('id') : $id;

        $this->branchOfficeRepository->destroy($id);
        session()->flash(
            'success',
            trans_choice('branchOffice.destroy_branch_office_success', count($id))
        );
    }
}
