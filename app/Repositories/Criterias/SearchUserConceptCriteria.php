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

namespace App\Repositories\Criterias;

use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;
use Illuminate\Support\Collection;

/**
 * Class SearchUserConceptCriteria
 *
 * @author Johan Alvarez <llstarscreamll@hotmail.com>
 */
class SearchUserConceptCriteria implements CriteriaInterface
{
    /**
     * @var Illuminate\Support\Collection
     */
    private $input;

    /**
     * Crea nueva instancia de SearchUserConceptCriteria.
     *
     * @param  Request $request
     */
    public function __construct(Collection $input)
    {
        $this->input = $input;
    }

    /**
     * Apply criteria in query repository
     *
     * @param UserConcept $model
     * @param RepositoryInterface $repository
     *
     * @return Illuminate\Database\Eloquent\Builder
     */
    public function apply($model, RepositoryInterface $repository)
    {
        $model = $model->query();

        // buscamos basados en los datos que señale el usuario
        $this->input->get('ids') && $model->whereIn('id', $this->input->get('ids'));

        $this->input->get('name') && $model->where('name', 'like', '%'.$this->input->get('name').'%');

        $this->input->get('type') && $model->whereIn('type', $this->input->get('type'));

        $this->input->get('is_wage_true') && $model->where('is_wage', true);
        ($this->input->get('is_wage_false') && !$this->input->has('is_wage_true')) && $model->where('is_wage', false);
        ($this->input->get('is_wage_false') && $this->input->has('is_wage_true')) && $model->orWhere('is_wage', false);

        $this->input->get('apply_1393_law_true') && $model->where('apply_1393_law', true);
        ($this->input->get('apply_1393_law_false') && !$this->input->has('apply_1393_law_true')) && $model->where('apply_1393_law', false);
        ($this->input->get('apply_1393_law_false') && $this->input->has('apply_1393_law_true')) && $model->orWhere('apply_1393_law', false);

        $this->input->get('retention_true') && $model->where('retention', true);
        ($this->input->get('retention_false') && !$this->input->has('retention_true')) && $model->where('retention', false);
        ($this->input->get('retention_false') && $this->input->has('retention_true')) && $model->orWhere('retention', false);

        $this->input->get('ibc_health_true') && $model->where('ibc_health', true);
        ($this->input->get('ibc_health_false') && !$this->input->has('ibc_health_true')) && $model->where('ibc_health', false);
        ($this->input->get('ibc_health_false') && $this->input->has('ibc_health_true')) && $model->orWhere('ibc_health', false);

        $this->input->get('ibc_pension_true') && $model->where('ibc_pension', true);
        ($this->input->get('ibc_pension_false') && !$this->input->has('ibc_pension_true')) && $model->where('ibc_pension', false);
        ($this->input->get('ibc_pension_false') && $this->input->has('ibc_pension_true')) && $model->orWhere('ibc_pension', false);

        $this->input->get('ibc_arl_true') && $model->where('ibc_arl', true);
        ($this->input->get('ibc_arl_false') && !$this->input->has('ibc_arl_true')) && $model->where('ibc_arl', false);
        ($this->input->get('ibc_arl_false') && $this->input->has('ibc_arl_true')) && $model->orWhere('ibc_arl', false);

        $this->input->get('ccf_base_true') && $model->where('ccf_base', true);
        ($this->input->get('ccf_base_false') && !$this->input->has('ccf_base_true')) && $model->where('ccf_base', false);
        ($this->input->get('ccf_base_false') && $this->input->has('ccf_base_true')) && $model->orWhere('ccf_base', false);

        $this->input->get('sena_base_true') && $model->where('sena_base', true);
        ($this->input->get('sena_base_false') && !$this->input->has('sena_base_true')) && $model->where('sena_base', false);
        ($this->input->get('sena_base_false') && $this->input->has('sena_base_true')) && $model->orWhere('sena_base', false);

        $this->input->get('icbf_base_true') && $model->where('icbf_base', true);
        ($this->input->get('icbf_base_false') && !$this->input->has('icbf_base_true')) && $model->where('icbf_base', false);
        ($this->input->get('icbf_base_false') && $this->input->has('icbf_base_true')) && $model->orWhere('icbf_base', false);

        $this->input->get('severance_base_true') && $model->where('severance_base', true);
        ($this->input->get('severance_base_false') && !$this->input->has('severance_base_true')) && $model->where('severance_base', false);
        ($this->input->get('severance_base_false') && $this->input->has('severance_base_true')) && $model->orWhere('severance_base', false);

        $this->input->get('premium_base_true') && $model->where('premium_base', true);
        ($this->input->get('premium_base_false') && !$this->input->has('premium_base_true')) && $model->where('premium_base', false);
        ($this->input->get('premium_base_false') && $this->input->has('premium_base_true')) && $model->orWhere('premium_base', false);

        $this->input->get('provisioning_holiday_true') && $model->where('provisioning_holiday', true);
        ($this->input->get('provisioning_holiday_false') && !$this->input->has('provisioning_holiday_true')) && $model->where('provisioning_holiday', false);
        ($this->input->get('provisioning_holiday_false') && $this->input->has('provisioning_holiday_true')) && $model->orWhere('provisioning_holiday', false);

        $this->input->get('money_holiday_base_true') && $model->where('money_holiday_base', true);
        ($this->input->get('money_holiday_base_false') && !$this->input->has('money_holiday_base_true')) && $model->where('money_holiday_base', false);
        ($this->input->get('money_holiday_base_false') && $this->input->has('money_holiday_base_true')) && $model->orWhere('money_holiday_base', false);

        $this->input->get('holidays_enjoyed_true') && $model->where('holidays_enjoyed', true);
        ($this->input->get('holidays_enjoyed_false') && !$this->input->has('holidays_enjoyed_true')) && $model->where('holidays_enjoyed', false);
        ($this->input->get('holidays_enjoyed_false') && $this->input->has('holidays_enjoyed_true')) && $model->orWhere('holidays_enjoyed', false);

        $this->input->get('holiday_contract_settlement_true') && $model->where('holiday_contract_settlement', true);
        ($this->input->get('holiday_contract_settlement_false') && !$this->input->has('holiday_contract_settlement_true')) && $model->where('holiday_contract_settlement', false);
        ($this->input->get('holiday_contract_settlement_false') && $this->input->has('holiday_contract_settlement_true')) && $model->orWhere('holiday_contract_settlement', false);

        $this->input->get('indemnity_true') && $model->where('indemnity', true);
        ($this->input->get('indemnity_false') && !$this->input->has('indemnity_true')) && $model->where('indemnity', false);
        ($this->input->get('indemnity_false') && $this->input->has('indemnity_true')) && $model->orWhere('indemnity', false);

        // ordenamos los resultados
        $model->orderBy($this->input->get('sort', 'name'), $this->input->get('sortType', 'desc'));

        return $model;
    }
}
