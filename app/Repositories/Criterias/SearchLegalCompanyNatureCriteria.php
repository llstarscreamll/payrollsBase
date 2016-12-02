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
 * Class SearchLegalCompanyNatureCriteria
 *
 * @author Johan Alvarez <llstarscreamll@hotmail.com>
 */
class SearchLegalCompanyNatureCriteria implements CriteriaInterface
{
    /**
     * @var Illuminate\Support\Collection
     */
    private $input;

    /**
     * Crea nueva instancia de SearchLegalCompanyNatureCriteria.
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
     * @param LegalCompanyNature $model
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

        $this->input->get('short_name') && $model->where('short_name', 'like', '%'.$this->input->get('short_name').'%');

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
