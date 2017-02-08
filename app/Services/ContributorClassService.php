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

use App\Http\Requests\ContributorClassRequest;
use App\Repositories\Contracts\ContributorClassRepository;
use App\Models\ContributorClass;
use Illuminate\Support\Collection;

/**
 * Clase ContributorClassService
 *
 * @author Johan Alvarez <llstarscreamll@hotmail.com>
 */
class ContributorClassService
{
    /**
     * @var App\Repositories\Contracts\ContributorClassRepository
     */
    private $contributorClassRepository;

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
     * @param App\Repositories\Contracts\ContributorClassRepository $contributorClassRepository
     */
    public function __construct(ContributorClassRepository $contributorClassRepository)
    {
        $this->contributorClassRepository = $contributorClassRepository;
    }

    /**
     * Obtiene datos de consulta predeterminada o lo que indique el usuario de
     * la entidad para la vista Index.
     *
     * @param  App\Http\Requests\ContributorClassRequest  $request
     *
     * @return Illuminate\Pagination\LengthAwarePaginator
     */
    public function indexSearch(ContributorClassRequest $request)
    {
        $search = collect($request->get('search'));
        return $this->contributorClassRepository
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
     * @param  App\Http\Requests\ContributorClassRequest  $request
     *
     * @return array
     */
    public function getIndexTableData(ContributorClassRequest $request)
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
        $contributorClass = $this->contributorClassRepository->find($id);
        $data['contributorClass'] = $contributorClass;
    
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
        $data['contributorClass'] = $this->contributorClassRepository->find($id);
        $data += $this->getCreateFormData();
        
        return $data;
    }

    /**
     * Guarda en base de datos nuevo registro de Clase de aportante.
     *
     * @param  App\Http\Requests\ContributorClassRequest  $request
     *
     * @return App\Models\ContributorClass
     */
    public function store(ContributorClassRequest $request)
    {
        $input = null_empty_fields($request->all());
        $contributorClass = $this->contributorClassRepository->create($input);
        session()->flash('success', trans('contributorClass.store_contributor_class_success'));

        return $contributorClass;
    }

    /**
     * Realiza actualización de Clase de aportante.
     *
     * @param  int  $id
     * @param  App\Http\Requests\ContributorClassRequest  $request
     *
     * @return  App\Models\ContributorClass
     */
    public function update(int $id, ContributorClassRequest $request)
    {
        $input = null_empty_fields($request->all());
        $contributorClass = $this->contributorClassRepository->update($input, $id);
        session()->flash(
            'success',
            trans('contributorClass.update_contributor_class_success')
        );

        return $contributorClass;
    }

    /**
     * Realiza acción de eliminar registro de Clase de aportante.
     *
     * @param  int  $id
     * @param  App\Http\Requests\ContributorClassRequest  $request
     */
    public function destroy(int $id, ContributorClassRequest $request)
    {
        $id = $request->has('id') ? $request->get('id') : $id;

        $this->contributorClassRepository->destroy($id);
        session()->flash(
            'success',
            trans_choice('contributorClass.destroy_contributor_class_success', count($id))
        );
    }
}
