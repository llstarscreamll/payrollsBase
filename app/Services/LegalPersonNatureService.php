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

use App\Http\Requests\LegalPersonNatureRequest;
use App\Repositories\Contracts\LegalPersonNatureRepository;
use App\Models\LegalPersonNature;
use Illuminate\Support\Collection;

/**
 * Clase LegalPersonNatureService
 *
 * @author Johan Alvarez <llstarscreamll@hotmail.com>
 */
class LegalPersonNatureService
{
    /**
     * @var App\Repositories\Contracts\LegalPersonNatureRepository
     */
    private $legalPersonNatureRepository;

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
     * @param App\Repositories\Contracts\LegalPersonNatureRepository $legalPersonNatureRepository
     */
    public function __construct(LegalPersonNatureRepository $legalPersonNatureRepository)
    {
        $this->legalPersonNatureRepository = $legalPersonNatureRepository;
    }

    /**
     * Obtiene datos de consulta predeterminada o lo que indique el usuario de
     * la entidad para la vista Index.
     *
     * @param  App\Http\Requests\LegalPersonNatureRequest  $request
     *
     * @return Illuminate\Pagination\LengthAwarePaginator
     */
    public function indexSearch(LegalPersonNatureRequest $request)
    {
        $search = collect($request->get('search'));
        return $this->legalPersonNatureRepository
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
     * @param  App\Http\Requests\LegalPersonNatureRequest  $request
     *
     * @return array
     */
    public function getIndexTableData(LegalPersonNatureRequest $request)
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
        $legalPersonNature = $this->legalPersonNatureRepository->find($id);
        $data['legalPersonNature'] = $legalPersonNature;
    
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
        $data['legalPersonNature'] = $this->legalPersonNatureRepository->find($id);
        $data += $this->getCreateFormData();
        
        return $data;
    }

    /**
     * Guarda en base de datos nuevo registro de Tipo de Persona.
     *
     * @param  App\Http\Requests\LegalPersonNatureRequest  $request
     *
     * @return App\Models\LegalPersonNature
     */
    public function store(LegalPersonNatureRequest $request)
    {
        $input = null_empty_fields($request->all());
        $legalPersonNature = $this->legalPersonNatureRepository->create($input);
        session()->flash('success', trans('legalPersonNature.store_legal_person_nature_success'));

        return $legalPersonNature;
    }

    /**
     * Realiza actualización de Tipo de Persona.
     *
     * @param  int  $id
     * @param  App\Http\Requests\LegalPersonNatureRequest  $request
     *
     * @return  App\Models\LegalPersonNature
     */
    public function update(int $id, LegalPersonNatureRequest $request)
    {
        $input = null_empty_fields($request->all());
        $legalPersonNature = $this->legalPersonNatureRepository->update($input, $id);
        session()->flash(
            'success',
            trans('legalPersonNature.update_legal_person_nature_success')
        );

        return $legalPersonNature;
    }

    /**
     * Realiza acción de eliminar registro de Tipo de Persona.
     *
     * @param  int  $id
     * @param  App\Http\Requests\LegalPersonNatureRequest  $request
     */
    public function destroy(int $id, LegalPersonNatureRequest $request)
    {
        $id = $request->has('id') ? $request->get('id') : $id;

        $this->legalPersonNatureRepository->destroy($id);
        session()->flash(
            'success',
            trans_choice('legalPersonNature.destroy_legal_person_nature_success', count($id))
        );
    }
}
