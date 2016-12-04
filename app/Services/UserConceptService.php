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

use App\Http\Requests\UserConceptRequest;
use App\Repositories\Contracts\UserConceptRepository;
use App\Models\UserConcept;
use Illuminate\Support\Collection;

/**
 * Clase UserConceptService
 *
 * @author Johan Alvarez <llstarscreamll@hotmail.com>
 */
class UserConceptService
{
    /**
     * @var App\Repositories\Contracts\UserConceptRepository
     */
    private $userConceptRepository;

    /**
     * Las columnas predeterminadas a mostrar en la tabla del Index.
     *
     * @var array
     */
    private $defaultSelectedtableColumns = [
        'name',
        'type',
        'is_wage',
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
     * @param App\Repositories\Contracts\UserConceptRepository $userConceptRepository
     */
    public function __construct(UserConceptRepository $userConceptRepository)
    {
        $this->userConceptRepository = $userConceptRepository;
    }

    /**
     * Obtiene datos de consulta predeterminada o lo que indique el usuario de
     * la entidad para la vista Index.
     *
     * @param  App\Http\Requests\UserConceptRequest  $request
     *
     * @return Illuminate\Pagination\LengthAwarePaginator
     */
    public function indexSearch(UserConceptRequest $request)
    {
        $search = collect($request->get('search'));
        return $this->userConceptRepository
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
     * @param  App\Http\Requests\UserConceptRequest  $request
     *
     * @return array
     */
    public function getIndexTableData(UserConceptRequest $request)
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
        $data['type_list'] = $this->userConceptRepository->getEnumFieldSelectList('type');
    
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
        $userConcept = $this->userConceptRepository->find($id);
        $data['userConcept'] = $userConcept;
        $data['type_list'] = $userConcept->getEnumValuesArray('type');
    
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
        $data['userConcept'] = $this->userConceptRepository->find($id);
        $data += $this->getCreateFormData();
        
        return $data;
    }

    /**
     * Guarda en base de datos nuevo registro de Concepto.
     *
     * @param  App\Http\Requests\UserConceptRequest  $request
     *
     * @return App\Models\UserConcept
     */
    public function store(UserConceptRequest $request)
    {
        $input = null_empty_fields($request->all());
        $userConcept = $this->userConceptRepository->create($input);
        session()->flash('success', trans('userConcept.store_user_concept_success'));

        return $userConcept;
    }

    /**
     * Realiza actualización de Concepto.
     *
     * @param  int  $id
     * @param  App\Http\Requests\UserConceptRequest  $request
     *
     * @return  App\Models\UserConcept
     */
    public function update(int $id, UserConceptRequest $request)
    {
        $input = null_empty_fields($request->all());
        $userConcept = $this->userConceptRepository->update($input, $id);
        session()->flash(
            'success',
            trans('userConcept.update_user_concept_success')
        );

        return $userConcept;
    }

    /**
     * Realiza acción de eliminar registro de Concepto.
     *
     * @param  int  $id
     * @param  App\Http\Requests\UserConceptRequest  $request
     */
    public function destroy(int $id, UserConceptRequest $request)
    {
        $id = $request->has('id') ? $request->get('id') : $id;

        $this->userConceptRepository->destroy($id);
        session()->flash(
            'success',
            trans_choice('userConcept.destroy_user_concept_success', count($id))
        );
    }
}
