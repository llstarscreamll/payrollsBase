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

use App\Http\Requests\BranchRequest;
use App\Repositories\Contracts\BranchRepository;
use App\Models\Branch;
use App\Repositories\Contracts\CompanyRepository;
use Illuminate\Support\Collection;

/**
 * Clase BranchService
 *
 * @author Johan Alvarez <llstarscreamll@hotmail.com>
 */
class BranchService
{
    /**
     * @var App\Repositories\Contracts\BranchRepository
     */
    private $branchRepository;
    
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
     * @param App\Repositories\Contracts\BranchRepository $branchRepository
     * @param App\Repositories\Contracts\CompanyRepository $companyRepository
     */
    public function __construct(BranchRepository $branchRepository, CompanyRepository $companyRepository)
    {
        $this->branchRepository = $branchRepository;
        $this->companyRepository = $companyRepository;
    }

    /**
     * Obtiene datos de consulta predeterminada o lo que indique el usuario de
     * la entidad para la vista Index.
     *
     * @param  App\Http\Requests\BranchRequest  $request
     *
     * @return Illuminate\Pagination\LengthAwarePaginator
     */
    public function indexSearch(BranchRequest $request)
    {
        $search = collect($request->get('search'));
        return $this->branchRepository
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
     * @param  App\Http\Requests\BranchRequest  $request
     *
     * @return array
     */
    public function getIndexTableData(BranchRequest $request)
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
        $branch = $this->branchRepository->find($id);
        $data['branch'] = $branch;
        $data['company_id_list'] = $this->companyRepository->getSelectList(
            'id',
            'name',
            (array) $branch->company_id
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
        $data['branch'] = $this->branchRepository->find($id);
        $data += $this->getCreateFormData();
        
        return $data;
    }

    /**
     * Guarda en base de datos nuevo registro de Sucursal.
     *
     * @param  App\Http\Requests\BranchRequest  $request
     *
     * @return App\Models\Branch
     */
    public function store(BranchRequest $request)
    {
        $input = null_empty_fields($request->all());
        $branch = $this->branchRepository->create($input);
        session()->flash('success', trans('branch.store_branch_success'));

        return $branch;
    }

    /**
     * Realiza actualización de Sucursal.
     *
     * @param  int  $id
     * @param  App\Http\Requests\BranchRequest  $request
     *
     * @return  App\Models\Branch
     */
    public function update(int $id, BranchRequest $request)
    {
        $input = null_empty_fields($request->all());
        $branch = $this->branchRepository->update($input, $id);
        session()->flash(
            'success',
            trans('branch.update_branch_success')
        );

        return $branch;
    }

    /**
     * Realiza acción de eliminar registro de Sucursal.
     *
     * @param  int  $id
     * @param  App\Http\Requests\BranchRequest  $request
     */
    public function destroy(int $id, BranchRequest $request)
    {
        $id = $request->has('id') ? $request->get('id') : $id;

        $this->branchRepository->destroy($id);
        session()->flash(
            'success',
            trans_choice('branch.destroy_branch_success', count($id))
        );
    }
}
