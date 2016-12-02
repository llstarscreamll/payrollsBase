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

use App\Http\Requests\MunicipalityRequest;
use App\Repositories\Contracts\MunicipalityRepository;
use App\Models\Municipality;
use App\Repositories\Contracts\DepartmentRepository;
use Illuminate\Support\Collection;

/**
 * Clase MunicipalityService
 *
 * @author Johan Alvarez <llstarscreamll@hotmail.com>
 */
class MunicipalityService
{
    /**
     * @var App\Repositories\Contracts\MunicipalityRepository
     */
    private $municipalityRepository;
    
    /**
     * @var App\Repositories\Contracts\DepartmentRepository
     */
    private $departmentRepository;

    /**
     * Las columnas predeterminadas a mostrar en la tabla del Index.
     *
     * @var array
     */
    private $defaultSelectedtableColumns = [
        'department_id',
        'code',
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
     * @param App\Repositories\Contracts\MunicipalityRepository $municipalityRepository
     * @param App\Repositories\Contracts\DepartmentRepository $departmentRepository
     */
    public function __construct(MunicipalityRepository $municipalityRepository, DepartmentRepository $departmentRepository)
    {
        $this->municipalityRepository = $municipalityRepository;
        $this->departmentRepository = $departmentRepository;
    }

    /**
     * Obtiene datos de consulta predeterminada o lo que indique el usuario de
     * la entidad para la vista Index.
     *
     * @param  App\Http\Requests\MunicipalityRequest  $request
     *
     * @return Illuminate\Pagination\LengthAwarePaginator
     */
    public function indexSearch(MunicipalityRequest $request)
    {
        $search = collect($request->get('search'));
        return $this->municipalityRepository
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
     * @param  App\Http\Requests\MunicipalityRequest  $request
     *
     * @return array
     */
    public function getIndexTableData(MunicipalityRequest $request)
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
        $data['department_id_list'] = $this->departmentRepository->getSelectList();
    
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
        $municipality = $this->municipalityRepository->find($id);
        $data['municipality'] = $municipality;
        $data['department_id_list'] = $this->departmentRepository->getSelectList(
            'id',
            'name',
            (array) $municipality->department_id
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
        $data['municipality'] = $this->municipalityRepository->find($id);
        $data += $this->getCreateFormData();
        
        return $data;
    }

    /**
     * Guarda en base de datos nuevo registro de Municipio.
     *
     * @param  App\Http\Requests\MunicipalityRequest  $request
     *
     * @return App\Models\Municipality
     */
    public function store(MunicipalityRequest $request)
    {
        $input = null_empty_fields($request->all());
        $municipality = $this->municipalityRepository->create($input);
        session()->flash('success', trans('municipality.store_municipality_success'));

        return $municipality;
    }

    /**
     * Realiza actualización de Municipio.
     *
     * @param  int  $id
     * @param  App\Http\Requests\MunicipalityRequest  $request
     *
     * @return  App\Models\Municipality
     */
    public function update(int $id, MunicipalityRequest $request)
    {
        $input = null_empty_fields($request->all());
        $municipality = $this->municipalityRepository->update($input, $id);
        session()->flash(
            'success',
            trans('municipality.update_municipality_success')
        );

        return $municipality;
    }

    /**
     * Realiza acción de eliminar registro de Municipio.
     *
     * @param  int  $id
     * @param  App\Http\Requests\MunicipalityRequest  $request
     */
    public function destroy(int $id, MunicipalityRequest $request)
    {
        $id = $request->has('id') ? $request->get('id') : $id;

        $this->municipalityRepository->destroy($id);
        session()->flash(
            'success',
            trans_choice('municipality.destroy_municipality_success', count($id))
        );
    }
}
