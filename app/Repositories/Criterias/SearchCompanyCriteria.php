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
 * Class SearchCompanyCriteria
 *
 * @author Johan Alvarez <llstarscreamll@hotmail.com>
 */
class SearchCompanyCriteria implements CriteriaInterface
{
    /**
     * @var Illuminate\Support\Collection
     */
    private $input;

    /**
     * Crea nueva instancia de SearchCompanyCriteria.
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
     * @param Company $model
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

        $this->input->get('identity_card_type_id') && $model->whereIn('identity_card_type_id', $this->input->get('identity_card_type_id'));

        $this->input->get('contributor_identity_card_number') && $model->where('contributor_identity_card_number', $this->input->get('contributor_identity_card_number'));

        $this->input->get('verification_digit') && $model->where('verification_digit', $this->input->get('verification_digit'));

        $this->input->get('company_taxpayer_type_id') && $model->whereIn('company_taxpayer_type_id', $this->input->get('company_taxpayer_type_id'));

        $this->input->get('legal_company_nature_id') && $model->whereIn('legal_company_nature_id', $this->input->get('legal_company_nature_id'));

        $this->input->get('legal_person_nature_id') && $model->whereIn('legal_person_nature_id', $this->input->get('legal_person_nature_id'));

        $this->input->get('has_branches_true') && $model->where('has_branches', true);
        ($this->input->get('has_branches_false') && !$this->input->has('has_branches_true')) && $model->where('has_branches', false);
        ($this->input->get('has_branches_false') && $this->input->has('has_branches_true')) && $model->orWhere('has_branches', false);

        $this->input->get('applay_1607_law_true') && $model->where('applay_1607_law', true);
        ($this->input->get('applay_1607_law_false') && !$this->input->has('applay_1607_law_true')) && $model->where('applay_1607_law', false);
        ($this->input->get('applay_1607_law_false') && $this->input->has('applay_1607_law_true')) && $model->orWhere('applay_1607_law', false);

        $this->input->get('applay_1429_law_true') && $model->where('applay_1429_law', true);
        ($this->input->get('applay_1429_law_false') && !$this->input->has('applay_1429_law_true')) && $model->where('applay_1429_law', false);
        ($this->input->get('applay_1429_law_false') && $this->input->has('applay_1429_law_true')) && $model->orWhere('applay_1429_law', false);

        $this->input->get('founded_at')['informative'] && $model->whereBetween('founded_at', [
            $this->input->get('founded_at')['from'],
            $this->input->get('founded_at')['to']
        ]);

        $this->input->get('address') && $model->where('address', 'like', '%'.$this->input->get('address').'%');

        $this->input->get('municipality_id') && $model->whereIn('municipality_id', $this->input->get('municipality_id'));

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
