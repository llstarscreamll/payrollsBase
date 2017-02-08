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

use App\Http\Requests\ContributorTypeRequest;
use App\Repositories\Contracts\ContributorTypeRepository;
use App\Models\ContributorType;
use Illuminate\Support\Collection;

/**
 * Clase ContributorTypeService
 *
 * @author Johan Alvarez <llstarscreamll@hotmail.com>
 */
class ContributorTypeService
{
    /**
     * @var App\Repositories\Contracts\ContributorTypeRepository
     */
    private $contributorTypeRepository;

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
     * @param App\Repositories\Contracts\ContributorTypeRepository $contributorTypeRepository
     */
    public function __construct(ContributorTypeRepository $contributorTypeRepository)
    {
        $this->contributorTypeRepository = $contributorTypeRepository;
    }

    /**
     * Obtiene datos de consulta predeterminada o lo que indique el usuario de
     * la entidad para la vista Index.
     *
     * @param  App\Http\Requests\ContributorTypeRequest  $request
     *
     * @return Illuminate\Pagination\LengthAwarePaginator
     */
    public function indexSearch(ContributorTypeRequest $request)
    {
        $search = collect($request->get('search'));
        return $this->contributorTypeRepository
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
     * @param  App\Http\Requests\ContributorTypeRequest  $request
     *
     * @return array
     */
    public function getIndexTableData(ContributorTypeRequest $request)
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
        $contributorType = $this->contributorTypeRepository->find($id);
        $data['contributorType'] = $contributorType;
    
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
        $data['contributorType'] = $this->contributorTypeRepository->find($id);
        $data += $this->getCreateFormData();
        
        return $data;
    }

    /**
     * Guarda en base de datos nuevo registro de Tipo de aportante.
     *
     * @param  App\Http\Requests\ContributorTypeRequest  $request
     *
     * @return App\Models\ContributorType
     */
    public function store(ContributorTypeRequest $request)
    {
        $input = null_empty_fields($request->all());
        $contributorType = $this->contributorTypeRepository->create($input);
        session()->flash('success', trans('contributorType.store_contributor_type_success'));

        return $contributorType;
    }

    /**
     * Realiza actualización de Tipo de aportante.
     *
     * @param  int  $id
     * @param  App\Http\Requests\ContributorTypeRequest  $request
     *
     * @return  App\Models\ContributorType
     */
    public function update(int $id, ContributorTypeRequest $request)
    {
        $input = null_empty_fields($request->all());
        $contributorType = $this->contributorTypeRepository->update($input, $id);
        session()->flash(
            'success',
            trans('contributorType.update_contributor_type_success')
        );

        return $contributorType;
    }

    /**
     * Realiza acción de eliminar registro de Tipo de aportante.
     *
     * @param  int  $id
     * @param  App\Http\Requests\ContributorTypeRequest  $request
     */
    public function destroy(int $id, ContributorTypeRequest $request)
    {
        $id = $request->has('id') ? $request->get('id') : $id;

        $this->contributorTypeRepository->destroy($id);
        session()->flash(
            'success',
            trans_choice('contributorType.destroy_contributor_type_success', count($id))
        );
    }
}
