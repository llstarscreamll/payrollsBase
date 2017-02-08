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

use App\Http\Requests\PilaPaymentOperatorRequest;
use App\Repositories\Contracts\PilaPaymentOperatorRepository;
use App\Models\PilaPaymentOperator;
use Illuminate\Support\Collection;

/**
 * Clase PilaPaymentOperatorService
 *
 * @author Johan Alvarez <llstarscreamll@hotmail.com>
 */
class PilaPaymentOperatorService
{
    /**
     * @var App\Repositories\Contracts\PilaPaymentOperatorRepository
     */
    private $pilaPaymentOperatorRepository;

    /**
     * Las columnas predeterminadas a mostrar en la tabla del Index.
     *
     * @var array
     */
    private $defaultSelectedtableColumns = [
        'name',
        'phone',
        'email',
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
     * @param App\Repositories\Contracts\PilaPaymentOperatorRepository $pilaPaymentOperatorRepository
     */
    public function __construct(PilaPaymentOperatorRepository $pilaPaymentOperatorRepository)
    {
        $this->pilaPaymentOperatorRepository = $pilaPaymentOperatorRepository;
    }

    /**
     * Obtiene datos de consulta predeterminada o lo que indique el usuario de
     * la entidad para la vista Index.
     *
     * @param  App\Http\Requests\PilaPaymentOperatorRequest  $request
     *
     * @return Illuminate\Pagination\LengthAwarePaginator
     */
    public function indexSearch(PilaPaymentOperatorRequest $request)
    {
        $search = collect($request->get('search'));
        return $this->pilaPaymentOperatorRepository
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
     * @param  App\Http\Requests\PilaPaymentOperatorRequest  $request
     *
     * @return array
     */
    public function getIndexTableData(PilaPaymentOperatorRequest $request)
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
        $pilaPaymentOperator = $this->pilaPaymentOperatorRepository->find($id);
        $data['pilaPaymentOperator'] = $pilaPaymentOperator;
    
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
        $data['pilaPaymentOperator'] = $this->pilaPaymentOperatorRepository->find($id);
        $data += $this->getCreateFormData();
        
        return $data;
    }

    /**
     * Guarda en base de datos nuevo registro de Operador de pago PILA.
     *
     * @param  App\Http\Requests\PilaPaymentOperatorRequest  $request
     *
     * @return App\Models\PilaPaymentOperator
     */
    public function store(PilaPaymentOperatorRequest $request)
    {
        $input = null_empty_fields($request->all());
        $pilaPaymentOperator = $this->pilaPaymentOperatorRepository->create($input);
        session()->flash('success', trans('pilaPaymentOperator.store_pila_payment_operator_success'));

        return $pilaPaymentOperator;
    }

    /**
     * Realiza actualización de Operador de pago PILA.
     *
     * @param  int  $id
     * @param  App\Http\Requests\PilaPaymentOperatorRequest  $request
     *
     * @return  App\Models\PilaPaymentOperator
     */
    public function update(int $id, PilaPaymentOperatorRequest $request)
    {
        $input = null_empty_fields($request->all());
        $pilaPaymentOperator = $this->pilaPaymentOperatorRepository->update($input, $id);
        session()->flash(
            'success',
            trans('pilaPaymentOperator.update_pila_payment_operator_success')
        );

        return $pilaPaymentOperator;
    }

    /**
     * Realiza acción de eliminar registro de Operador de pago PILA.
     *
     * @param  int  $id
     * @param  App\Http\Requests\PilaPaymentOperatorRequest  $request
     */
    public function destroy(int $id, PilaPaymentOperatorRequest $request)
    {
        $id = $request->has('id') ? $request->get('id') : $id;

        $this->pilaPaymentOperatorRepository->destroy($id);
        session()->flash(
            'success',
            trans_choice('pilaPaymentOperator.destroy_pila_payment_operator_success', count($id))
        );
    }
}
