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
 * Class SearchEmployeeCriteria
 *
 * @author Johan Alvarez <llstarscreamll@hotmail.com>
 */
class SearchEmployeeCriteria implements CriteriaInterface
{
    /**
     * @var Illuminate\Support\Collection
     */
    private $input;

    /**
     * Crea nueva instancia de SearchEmployeeCriteria.
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
     * @param Employee $model
     * @param RepositoryInterface $repository
     *
     * @return Illuminate\Database\Eloquent\Builder
     */
    public function apply($model, RepositoryInterface $repository)
    {
        $model = $model->query();

        // buscamos basados en los datos que señale el usuario
        $this->input->get('ids') && $model->whereIn('id', $this->input->get('ids'));

        $this->input->get('dni') && $model->where('dni', $this->input->get('dni'));

        $this->input->get('name') && $model->where('name', 'like', '%'.$this->input->get('name').'%');

        $this->input->get('lastname') && $model->where('lastname', 'like', '%'.$this->input->get('lastname').'%');

        $this->input->get('branch_id') && $model->whereIn('branch_id', $this->input->get('branch_id'));

        $this->input->get('contract_type') && $model->whereIn('contract_type', $this->input->get('contract_type'));

        $this->input->get('salary') && $model->where('salary', $this->input->get('salary'));

        $this->input->get('salary_type') && $model->whereIn('salary_type', $this->input->get('salary_type'));

        $this->input->get('occupational_risk_level') && $model->whereIn('occupational_risk_level', $this->input->get('occupational_risk_level'));

        $this->input->get('employee_taxpayer_type_id') && $model->whereIn('employee_taxpayer_type_id', $this->input->get('employee_taxpayer_type_id'));

        $this->input->get('dependents_deduction') && $model->where('dependents_deduction', $this->input->get('dependents_deduction'));

        $this->input->get('average_EPS_contributions_last_year') && $model->where('average_EPS_contributions_last_year', $this->input->get('average_EPS_contributions_last_year'));

        $this->input->get('home_interest_deduction_last_year') && $model->where('home_interest_deduction_last_year', $this->input->get('home_interest_deduction_last_year'));

        $this->input->get('prepaid_medicine') && $model->where('prepaid_medicine', $this->input->get('prepaid_medicine'));

        $this->input->get('applay_2090_decree_true') && $model->where('applay_2090_decree', true);
        ($this->input->get('applay_2090_decree_false') && !$this->input->has('applay_2090_decree_true')) && $model->where('applay_2090_decree', false);
        ($this->input->get('applay_2090_decree_false') && $this->input->has('applay_2090_decree_true')) && $model->orWhere('applay_2090_decree', false);

        $this->input->get('contributor_subtype_true') && $model->where('contributor_subtype', true);
        ($this->input->get('contributor_subtype_false') && !$this->input->has('contributor_subtype_true')) && $model->where('contributor_subtype', false);
        ($this->input->get('contributor_subtype_false') && $this->input->has('contributor_subtype_true')) && $model->orWhere('contributor_subtype', false);

        $this->input->get('admitted_at')['informative'] && $model->whereBetween('admitted_at', [
            $this->input->get('admitted_at')['from'],
            $this->input->get('admitted_at')['to']
        ]);

        $this->input->get('egressed_at')['informative'] && $model->whereBetween('egressed_at', [
            $this->input->get('egressed_at')['from'],
            $this->input->get('egressed_at')['to']
        ]);

        $this->input->get('created_at')['informative'] && $model->whereBetween('created_at', [
            $this->input->get('created_at')['from'],
            $this->input->get('created_at')['to']
        ]);

        $this->input->get('updated_at')['informative'] && $model->whereBetween('updated_at', [
            $this->input->get('updated_at')['from'],
            $this->input->get('updated_at')['to']
        ]);

        // ordenamos los resultados
        $model->orderBy($this->input->get('sort', 'created_at'), $this->input->get('sortType', 'desc'));

        return $model;
    }
}
