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

use App\Http\Requests\LegalCompanyNatureRequest;
use App\Repositories\Contracts\LegalCompanyNatureRepository;
use App\Models\LegalCompanyNature;
use Illuminate\Support\Collection;

/**
 * Clase LegalCompanyNatureService
 *
 * @author Johan Alvarez <llstarscreamll@hotmail.com>
 */
class LegalCompanyNatureService
{
    /**
     * @var App\Repositories\Contracts\LegalCompanyNatureRepository
     */
    private $legalCompanyNatureRepository;

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
     * @param App\Repositories\Contracts\LegalCompanyNatureRepository $legalCompanyNatureRepository
     */
    public function __construct(LegalCompanyNatureRepository $legalCompanyNatureRepository)
    {
        $this->legalCompanyNatureRepository = $legalCompanyNatureRepository;
    }

    /**
     * Obtiene datos de consulta predeterminada o lo que indique el usuario de
     * la entidad para la vista Index.
     *
     * @param  App\Http\Requests\LegalCompanyNatureRequest  $request
     *
     * @return Illuminate\Pagination\LengthAwarePaginator
     */
    public function indexSearch(LegalCompanyNatureRequest $request)
    {
        $search = collect($request->get('search'));
        return $this->legalCompanyNatureRepository
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
     * @param  App\Http\Requests\LegalCompanyNatureRequest  $request
     *
     * @return array
     */
    public function getIndexTableData(LegalCompanyNatureRequest $request)
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
        $legalCompanyNature = $this->legalCompanyNatureRepository->find($id);
        $data['legalCompanyNature'] = $legalCompanyNature;
    
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
        $data['legalCompanyNature'] = $this->legalCompanyNatureRepository->find($id);
        $data += $this->getCreateFormData();
        
        return $data;
    }

    /**
     * Guarda en base de datos nuevo registro de Naturaleza Jurídica.
     *
     * @param  App\Http\Requests\LegalCompanyNatureRequest  $request
     *
     * @return App\Models\LegalCompanyNature
     */
    public function store(LegalCompanyNatureRequest $request)
    {
        $input = null_empty_fields($request->all());
        $legalCompanyNature = $this->legalCompanyNatureRepository->create($input);
        session()->flash('success', trans('legalCompanyNature.store_legal_company_nature_success'));

        return $legalCompanyNature;
    }

    /**
     * Realiza actualización de Naturaleza Jurídica.
     *
     * @param  int  $id
     * @param  App\Http\Requests\LegalCompanyNatureRequest  $request
     *
     * @return  App\Models\LegalCompanyNature
     */
    public function update(int $id, LegalCompanyNatureRequest $request)
    {
        $input = null_empty_fields($request->all());
        $legalCompanyNature = $this->legalCompanyNatureRepository->update($input, $id);
        session()->flash(
            'success',
            trans('legalCompanyNature.update_legal_company_nature_success')
        );

        return $legalCompanyNature;
    }

    /**
     * Realiza acción de eliminar registro de Naturaleza Jurídica.
     *
     * @param  int  $id
     * @param  App\Http\Requests\LegalCompanyNatureRequest  $request
     */
    public function destroy(int $id, LegalCompanyNatureRequest $request)
    {
        $id = $request->has('id') ? $request->get('id') : $id;

        $this->legalCompanyNatureRepository->destroy($id);
        session()->flash(
            'success',
            trans_choice('legalCompanyNature.destroy_legal_company_nature_success', count($id))
        );
    }
}
