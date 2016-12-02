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

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use App\Repositories\Contracts\CompanyTaxpayerTypeRepository;
use App\Models\CompanyTaxpayerType;
use App\Repositories\Criterias\SearchCompanyTaxpayerTypeCriteria;
use Illuminate\Support\Collection;

/**
 * Class CompanyTaxpayerTypeEloquentRepository
 *
 * @author Johan Alvarez <llstarscreamll@hotmail.com>
 */
class CompanyTaxpayerTypeEloquentRepository extends BaseRepository implements CompanyTaxpayerTypeRepository
{
    /**
     * Los atributos por los que se puede realizar búsquedas.
     *
     * @var array
     */
    protected $fieldSearchable = [
        'id',
        'name',
        'short_name',
        'created_at',
        'updated_at',
    ];

    /**
     * Especifíca el modelo Eloquent a usar.
     *
     * @return App\Models\CompanyTaxpayerType
     */
    public function model()
    {
        return CompanyTaxpayerType::class;
    }

    /**
     * Consulta los datos que le usuario indique del modelo.
     *
     * @param  Collection $request El input del usuario.
     * @param  array      $columns Las columnas a selecciondar de la tabla.
     * @param  int        $rows    Las filas a mostrar por página.
     *
     * @return Illuminate\Pagination\LengthAwarePaginator
     */
    public function getRequested(Collection $request, array $columns = ['*'], int $rows = 15)
    {
        return $this->pushCriteria(new SearchCompanyTaxpayerTypeCriteria($request))
        ->paginate($rows, $columns);
    }

    /**
     * Obtiene lista de datos con las columnas indicadas en $key y $name,
     * generalmente para ser usadas en selects de formularios.
     *
     * @param  string $key   Nombre de columna que va a ser indice del array.
     * @param  string $name  Nombre de columna que será el valor del indice del array.
     *
     * @return array
     */
    public function getSelectList(string $key = 'id', string $name = 'name')
    {
        return $this->model->pluck($name, $key)->all();
    }

    /**
     * Obtiene los posible valores de una columna de tipo enum.
     *
     * @param  string $column  El nombre de la columna.
     *
     * @return array
     */
    public function getEnumValuesArray(string $column)
    {
        return $this->model->getEnumValuesArray($column);
    }

    /**
     * Obtiene los posibles valores de una columna de tipo enum en forma de
     * lista array con sus valores traducidos.
     *
     * @param  string $column  El nombre de la columna.
     *
     * @return array
     */
    public function getEnumFieldSelectList(string $column)
    {
        return collect($this->getEnumValuesArray($column))
            ->map(function ($item, $key) {
                return $item = trans('companyTaxpayerType.form-labels.status_values.'.$item);
            })->all();
    }

    /**
     * Eliminar uno o varios registros.
     *
     * @param  array|int $ids Array de ids o un único id.
     *
     * @return int
     */
    public function destroy($ids)
    {
        return $this->model->destroy($ids);
    }
}
