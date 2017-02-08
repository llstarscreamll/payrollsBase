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

use App\Http\Requests\BankRequest;
use App\Repositories\Contracts\BankRepository;
use App\Models\Bank;
use Illuminate\Support\Collection;

/**
 * Clase BankService
 *
 * @author Johan Alvarez <llstarscreamll@hotmail.com>
 */
class BankService
{
    /**
     * @var App\Repositories\Contracts\BankRepository
     */
    private $bankRepository;

    /**
     * Las columnas predeterminadas a mostrar en la tabla del Index.
     *
     * @var array
     */
    private $defaultSelectedtableColumns = [
        'name',
        'short_name',
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
     * @param App\Repositories\Contracts\BankRepository $bankRepository
     */
    public function __construct(BankRepository $bankRepository)
    {
        $this->bankRepository = $bankRepository;
    }

    /**
     * Obtiene datos de consulta predeterminada o lo que indique el usuario de
     * la entidad para la vista Index.
     *
     * @param  App\Http\Requests\BankRequest  $request
     *
     * @return Illuminate\Pagination\LengthAwarePaginator
     */
    public function indexSearch(BankRequest $request)
    {
        $search = collect($request->get('search'));
        return $this->bankRepository
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
     * @param  App\Http\Requests\BankRequest  $request
     *
     * @return array
     */
    public function getIndexTableData(BankRequest $request)
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
        $bank = $this->bankRepository->find($id);
        $data['bank'] = $bank;
    
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
        $data['bank'] = $this->bankRepository->find($id);
        $data += $this->getCreateFormData();
        
        return $data;
    }

    /**
     * Guarda en base de datos nuevo registro de Banco.
     *
     * @param  App\Http\Requests\BankRequest  $request
     *
     * @return App\Models\Bank
     */
    public function store(BankRequest $request)
    {
        $input = null_empty_fields($request->all());
        $bank = $this->bankRepository->create($input);
        session()->flash('success', trans('bank.store_bank_success'));

        return $bank;
    }

    /**
     * Realiza actualización de Banco.
     *
     * @param  int  $id
     * @param  App\Http\Requests\BankRequest  $request
     *
     * @return  App\Models\Bank
     */
    public function update(int $id, BankRequest $request)
    {
        $input = null_empty_fields($request->all());
        $bank = $this->bankRepository->update($input, $id);
        session()->flash(
            'success',
            trans('bank.update_bank_success')
        );

        return $bank;
    }

    /**
     * Realiza acción de eliminar registro de Banco.
     *
     * @param  int  $id
     * @param  App\Http\Requests\BankRequest  $request
     */
    public function destroy(int $id, BankRequest $request)
    {
        $id = $request->has('id') ? $request->get('id') : $id;

        $this->bankRepository->destroy($id);
        session()->flash(
            'success',
            trans_choice('bank.destroy_bank_success', count($id))
        );
    }
}
