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

use App\Http\Requests\IdentityCardTypeRequest;
use App\Repositories\Contracts\IdentityCardTypeRepository;
use App\Models\IdentityCardType;
use Illuminate\Support\Collection;

/**
 * Clase IdentityCardTypeService
 *
 * @author Johan Alvarez <llstarscreamll@hotmail.com>
 */
class IdentityCardTypeService
{
    /**
     * @var App\Repositories\Contracts\IdentityCardTypeRepository
     */
    private $identityCardTypeRepository;

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
     * @param App\Repositories\Contracts\IdentityCardTypeRepository $identityCardTypeRepository
     */
    public function __construct(IdentityCardTypeRepository $identityCardTypeRepository)
    {
        $this->identityCardTypeRepository = $identityCardTypeRepository;
    }

    /**
     * Obtiene datos de consulta predeterminada o lo que indique el usuario de
     * la entidad para la vista Index.
     *
     * @param  App\Http\Requests\IdentityCardTypeRequest  $request
     *
     * @return Illuminate\Pagination\LengthAwarePaginator
     */
    public function indexSearch(IdentityCardTypeRequest $request)
    {
        $search = collect($request->get('search'));
        return $this->identityCardTypeRepository
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
     * @param  App\Http\Requests\IdentityCardTypeRequest  $request
     *
     * @return array
     */
    public function getIndexTableData(IdentityCardTypeRequest $request)
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
        $identityCardType = $this->identityCardTypeRepository->find($id);
        $data['identityCardType'] = $identityCardType;
    
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
        $data['identityCardType'] = $this->identityCardTypeRepository->find($id);
        $data += $this->getCreateFormData();
        
        return $data;
    }

    /**
     * Guarda en base de datos nuevo registro de Tipo de Documento de Identificación.
     *
     * @param  App\Http\Requests\IdentityCardTypeRequest  $request
     *
     * @return App\Models\IdentityCardType
     */
    public function store(IdentityCardTypeRequest $request)
    {
        $input = null_empty_fields($request->all());
        $identityCardType = $this->identityCardTypeRepository->create($input);
        session()->flash('success', trans('identityCardType.store_identity_card_type_success'));

        return $identityCardType;
    }

    /**
     * Realiza actualización de Tipo de Documento de Identificación.
     *
     * @param  int  $id
     * @param  App\Http\Requests\IdentityCardTypeRequest  $request
     *
     * @return  App\Models\IdentityCardType
     */
    public function update(int $id, IdentityCardTypeRequest $request)
    {
        $input = null_empty_fields($request->all());
        $identityCardType = $this->identityCardTypeRepository->update($input, $id);
        session()->flash(
            'success',
            trans('identityCardType.update_identity_card_type_success')
        );

        return $identityCardType;
    }

    /**
     * Realiza acción de eliminar registro de Tipo de Documento de Identificación.
     *
     * @param  int  $id
     * @param  App\Http\Requests\IdentityCardTypeRequest  $request
     */
    public function destroy(int $id, IdentityCardTypeRequest $request)
    {
        $id = $request->has('id') ? $request->get('id') : $id;

        $this->identityCardTypeRepository->destroy($id);
        session()->flash(
            'success',
            trans_choice('identityCardType.destroy_identity_card_type_success', count($id))
        );
    }
}
