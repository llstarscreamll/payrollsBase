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

        $this->input->get('legal_company_nature_id') && $model->whereIn('legal_company_nature_id', $this->input->get('legal_company_nature_id'));

        $this->input->get('person_type') && $model->where('person_type', 'like', '%'.$this->input->get('person_type').'%');

        $this->input->get('address') && $model->where('address', 'like', '%'.$this->input->get('address').'%');

        $this->input->get('municipality_id') && $model->whereIn('municipality_id', $this->input->get('municipality_id'));

        $this->input->get('dane_activity_code') && $model->where('dane_activity_code', 'like', '%'.$this->input->get('dane_activity_code').'%');

        $this->input->get('phone') && $model->where('phone', 'like', '%'.$this->input->get('phone').'%');

        $this->input->get('fax') && $model->where('fax', 'like', '%'.$this->input->get('fax').'%');

        $this->input->get('email') && $model->where('email', 'like', '%'.$this->input->get('email').'%');

        $this->input->get('legal_rep_identity_card_type_id') && $model->whereIn('legal_rep_identity_card_type_id', $this->input->get('legal_rep_identity_card_type_id'));

        $this->input->get('legal_rep_identity_card_number') && $model->where('legal_rep_identity_card_number', $this->input->get('legal_rep_identity_card_number'));

        $this->input->get('legal_rep_verification_digit') && $model->where('legal_rep_verification_digit', $this->input->get('legal_rep_verification_digit'));

        $this->input->get('legal_rep_first_name') && $model->where('legal_rep_first_name', 'like', '%'.$this->input->get('legal_rep_first_name').'%');

        $this->input->get('legal_rep_middle_name') && $model->where('legal_rep_middle_name', 'like', '%'.$this->input->get('legal_rep_middle_name').'%');

        $this->input->get('legal_rep_first_surname') && $model->where('legal_rep_first_surname', 'like', '%'.$this->input->get('legal_rep_first_surname').'%');

        $this->input->get('legal_rep_last_surname') && $model->where('legal_rep_last_surname', 'like', '%'.$this->input->get('legal_rep_last_surname').'%');

        $this->input->get('legal_rep_email') && $model->where('legal_rep_email', 'like', '%'.$this->input->get('legal_rep_email').'%');

        $this->input->get('contact_first_name') && $model->where('contact_first_name', 'like', '%'.$this->input->get('contact_first_name').'%');

        $this->input->get('contact_last_name') && $model->where('contact_last_name', 'like', '%'.$this->input->get('contact_last_name').'%');

        $this->input->get('contact_cell_phone') && $model->where('contact_cell_phone', 'like', '%'.$this->input->get('contact_cell_phone').'%');

        $this->input->get('contact_email') && $model->where('contact_email', 'like', '%'.$this->input->get('contact_email').'%');

        $this->input->get('contributor_class_id') && $model->whereIn('contributor_class_id', $this->input->get('contributor_class_id'));

        $this->input->get('presentation_form') && $model->where('presentation_form', 'like', '%'.$this->input->get('presentation_form').'%');

        $this->input->get('contributor_type_id') && $model->whereIn('contributor_type_id', $this->input->get('contributor_type_id'));

        $this->input->get('payroll_type_id') && $model->whereIn('payroll_type_id', $this->input->get('payroll_type_id'));

        $this->input->get('arl_company_id') && $model->whereIn('arl_company_id', $this->input->get('arl_company_id'));

        $this->input->get('arl_department_id') && $model->whereIn('arl_department_id', $this->input->get('arl_department_id'));

        $this->input->get('law_1429_from_2010_true') && $model->where('law_1429_from_2010', true);
        ($this->input->get('law_1429_from_2010_false') && !$this->input->has('law_1429_from_2010_true')) && $model->where('law_1429_from_2010', false);
        ($this->input->get('law_1429_from_2010_false') && $this->input->has('law_1429_from_2010_true')) && $model->orWhere('law_1429_from_2010', false);

        $this->input->get('law_1607_from_2012_true') && $model->where('law_1607_from_2012', true);
        ($this->input->get('law_1607_from_2012_false') && !$this->input->has('law_1607_from_2012_true')) && $model->where('law_1607_from_2012', false);
        ($this->input->get('law_1607_from_2012_false') && $this->input->has('law_1607_from_2012_true')) && $model->orWhere('law_1607_from_2012', false);

        $this->input->get('commercial_registration_date')['informative'] && $model->whereBetween('commercial_registration_date', [
            $this->input->get('commercial_registration_date')['from'],
            $this->input->get('commercial_registration_date')['to']
        ]);

        $this->input->get('payment_method') && $model->where('payment_method', 'like', '%'.$this->input->get('payment_method').'%');

        $this->input->get('bank_id') && $model->whereIn('bank_id', $this->input->get('bank_id'));

        $this->input->get('bank_account_type') && $model->where('bank_account_type', 'like', '%'.$this->input->get('bank_account_type').'%');

        $this->input->get('bank_account_number') && $model->where('bank_account_number', 'like', '%'.$this->input->get('bank_account_number').'%');

        $this->input->get('payment_frequency') && $model->where('payment_frequency', 'like', '%'.$this->input->get('payment_frequency').'%');

        $this->input->get('pila_payment_operator_id') && $model->whereIn('pila_payment_operator_id', $this->input->get('pila_payment_operator_id'));

        // ordenamos los resultados
        $model->orderBy($this->input->get('sort', 'name'), $this->input->get('sortType', 'desc'));

        return $model;
    }
}
