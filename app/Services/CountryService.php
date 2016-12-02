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

use App\Http\Requests\CountryRequest;
use App\Repositories\Contracts\CountryRepository;
use App\Models\Country;
use Illuminate\Support\Collection;

/**
 * Clase CountryService
 *
 * @author Johan Alvarez <llstarscreamll@hotmail.com>
 */
class CountryService
{
    /**
     * @var App\Repositories\Contracts\CountryRepository
     */
    private $countryRepository;

    /**
     * Las columnas predeterminadas a mostrar en la tabla del Index.
     *
     * @var array
     */
    private $defaultSelectedtableColumns = [
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
     * @param App\Repositories\Contracts\CountryRepository $countryRepository
     */
    public function __construct(CountryRepository $countryRepository)
    {
        $this->countryRepository = $countryRepository;
    }

    /**
     * Obtiene datos de consulta predeterminada o lo que indique el usuario de
     * la entidad para la vista Index.
     *
     * @param  App\Http\Requests\CountryRequest  $request
     *
     * @return Illuminate\Pagination\LengthAwarePaginator
     */
    public function indexSearch(CountryRequest $request)
    {
        $search = collect($request->get('search'));
        return $this->countryRepository
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
     * @param  App\Http\Requests\CountryRequest  $request
     *
     * @return array
     */
    public function getIndexTableData(CountryRequest $request)
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
        $country = $this->countryRepository->find($id);
        $data['country'] = $country;
    
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
        $data['country'] = $this->countryRepository->find($id);
        $data += $this->getCreateFormData();
        
        return $data;
    }

    /**
     * Guarda en base de datos nuevo registro de Pais.
     *
     * @param  App\Http\Requests\CountryRequest  $request
     *
     * @return App\Models\Country
     */
    public function store(CountryRequest $request)
    {
        $input = null_empty_fields($request->all());
        $country = $this->countryRepository->create($input);
        session()->flash('success', trans('country.store_country_success'));

        return $country;
    }

    /**
     * Realiza actualización de Pais.
     *
     * @param  int  $id
     * @param  App\Http\Requests\CountryRequest  $request
     *
     * @return  App\Models\Country
     */
    public function update(int $id, CountryRequest $request)
    {
        $input = null_empty_fields($request->all());
        $country = $this->countryRepository->update($input, $id);
        session()->flash(
            'success',
            trans('country.update_country_success')
        );

        return $country;
    }

    /**
     * Realiza acción de eliminar registro de Pais.
     *
     * @param  int  $id
     * @param  App\Http\Requests\CountryRequest  $request
     */
    public function destroy(int $id, CountryRequest $request)
    {
        $id = $request->has('id') ? $request->get('id') : $id;

        $this->countryRepository->destroy($id);
        session()->flash(
            'success',
            trans_choice('country.destroy_country_success', count($id))
        );
    }
}
