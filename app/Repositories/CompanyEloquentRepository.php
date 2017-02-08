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

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use App\Repositories\Contracts\CompanyRepository;
use App\Models\Company;
use App\Repositories\Criterias\SearchCompanyCriteria;
use Illuminate\Support\Collection;

/**
 * Class CompanyEloquentRepository
 *
 * @author Johan Alvarez <llstarscreamll@hotmail.com>
 */
class CompanyEloquentRepository extends BaseRepository implements CompanyRepository
{
    /**
     * Los atributos por los que se puede realizar búsquedas.
     *
     * @var array
     */
    protected $fieldSearchable = [
        'id',
        'name',
        'identity_card_type_id',
        'contributor_identity_card_number',
        'verification_digit',
        'legal_company_nature_id',
        'person_type',
        'address',
        'municipality_id',
        'dane_activity_code',
        'phone',
        'fax',
        'email',
        'legal_rep_identity_card_type_id',
        'legal_rep_identity_card_number',
        'legal_rep_verification_digit',
        'legal_rep_first_name',
        'legal_rep_middle_name',
        'legal_rep_first_surname',
        'legal_rep_last_surname',
        'legal_rep_email',
        'contact_first_name',
        'contact_last_name',
        'contact_cell_phone',
        'contact_email',
        'contributor_class_id',
        'presentation_form',
        'contributor_type_id',
        'payroll_type_id',
        'arl_company_id',
        'arl_department_id',
        'law_1429_from_2010',
        'law_1607_from_2012',
        'commercial_registration_date',
        'payment_method',
        'bank_id',
        'bank_account_type',
        'bank_account_number',
        'payment_frequency',
        'pila_payment_operator_id',
    ];

    /**
     * Especifíca el modelo Eloquent a usar.
     *
     * @return App\Models\Company
     */
    public function model()
    {
        return Company::class;
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
        return $this->pushCriteria(new SearchCompanyCriteria($request))
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
                return $item = trans('company.form-labels.status_values.'.$item);
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
