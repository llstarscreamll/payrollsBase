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

use App\Http\Requests\ArlCompanyRequest;
use App\Repositories\Contracts\ArlCompanyRepository;
use App\Models\ArlCompany;
use Illuminate\Support\Collection;

/**
 * Clase ArlCompanyService
 *
 * @author Johan Alvarez <llstarscreamll@hotmail.com>
 */
class ArlCompanyService
{
    /**
     * @var App\Repositories\Contracts\ArlCompanyRepository
     */
    private $arlCompanyRepository;

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
     * @param App\Repositories\Contracts\ArlCompanyRepository $arlCompanyRepository
     */
    public function __construct(ArlCompanyRepository $arlCompanyRepository)
    {
        $this->arlCompanyRepository = $arlCompanyRepository;
    }

    /**
     * Obtiene datos de consulta predeterminada o lo que indique el usuario de
     * la entidad para la vista Index.
     *
     * @param  App\Http\Requests\ArlCompanyRequest  $request
     *
     * @return Illuminate\Pagination\LengthAwarePaginator
     */
    public function indexSearch(ArlCompanyRequest $request)
    {
        $search = collect($request->get('search'));
        return $this->arlCompanyRepository
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
     * @param  App\Http\Requests\ArlCompanyRequest  $request
     *
     * @return array
     */
    public function getIndexTableData(ArlCompanyRequest $request)
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
        $arlCompany = $this->arlCompanyRepository->find($id);
        $data['arlCompany'] = $arlCompany;
    
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
        $data['arlCompany'] = $this->arlCompanyRepository->find($id);
        $data += $this->getCreateFormData();
        
        return $data;
    }

    /**
     * Guarda en base de datos nuevo registro de Compañía de ARL.
     *
     * @param  App\Http\Requests\ArlCompanyRequest  $request
     *
     * @return App\Models\ArlCompany
     */
    public function store(ArlCompanyRequest $request)
    {
        $input = null_empty_fields($request->all());
        $arlCompany = $this->arlCompanyRepository->create($input);
        session()->flash('success', trans('arlCompany.store_arl_company_success'));

        return $arlCompany;
    }

    /**
     * Realiza actualización de Compañía de ARL.
     *
     * @param  int  $id
     * @param  App\Http\Requests\ArlCompanyRequest  $request
     *
     * @return  App\Models\ArlCompany
     */
    public function update(int $id, ArlCompanyRequest $request)
    {
        $input = null_empty_fields($request->all());
        $arlCompany = $this->arlCompanyRepository->update($input, $id);
        session()->flash(
            'success',
            trans('arlCompany.update_arl_company_success')
        );

        return $arlCompany;
    }

    /**
     * Realiza acción de eliminar registro de Compañía de ARL.
     *
     * @param  int  $id
     * @param  App\Http\Requests\ArlCompanyRequest  $request
     */
    public function destroy(int $id, ArlCompanyRequest $request)
    {
        $id = $request->has('id') ? $request->get('id') : $id;

        $this->arlCompanyRepository->destroy($id);
        session()->flash(
            'success',
            trans_choice('arlCompany.destroy_arl_company_success', count($id))
        );
    }
}
