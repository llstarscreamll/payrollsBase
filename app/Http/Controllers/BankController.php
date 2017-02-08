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

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\BankService;
use App\Http\Requests\BankRequest;
use App\Http\Controllers\Controller;

/**
 * Clase BankController
 *
 * @author  Johan Alvarez <llstarscreamll@hotmail.com>
 */
class BankController extends Controller
{
    /**
     * El directorio donde están las vistas.
     *
     * @var  String
     */
    private $viewsDir = "banks";
    
    /**
     * @var  App\Services\BankService
     */
    private $bankService;
    
    /**
     * Create a new controller instance.
     */
    public function __construct(BankService $bankService)
    {
        // el usuario debe estar autenticado para acceder al controlador
        $this->middleware('auth');
        // el usuario debe tener permisos para acceder al controlador
        $this->middleware('permission', ['except' => ['store', 'update']]);
        $this->bankService = $bankService;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\BankRequest $request
     *
     * @return  Illuminate\Http\Response
     */
    public function index(BankRequest $request)
    {
        $data = $this->bankService->getIndexTableData($request);
        $data['records'] = $this->bankService->indexSearch($request);

        return $this->view('index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return  Illuminate\Http\Response
     */
    public function create()
    {
        $data = $this->bankService->getCreateFormData();
        return $this->view('create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param    App\Http\Requests\BankRequest  $request
     *
     * @return  Illuminate\Http\Response
     */
    public function store(BankRequest $request)
    {
        $this->bankService->store($request);
        return redirect()->route('banks.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return  Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $data = $this->bankService->getShowFormData($id);
        return $this->view('show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return  Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $data = $this->bankService->getEditFormData($id);
        return $this->view('edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @param  App\Http\Requests\BankRequest $request
     *
     * @return  Illuminate\Http\Response
     */
    public function update(int $id, BankRequest $request)
    {
        $this->bankService->update($id, $request);
        
        if ($request->isXmlHttpRequest()) {
            return response('ok!!', 204);
        }

        return redirect()->route('banks.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @param  App\Http\Requests\BankRequest $request
     *
     * @return  Illuminate\Http\Response
     */
    public function destroy(int $id, BankRequest $request)
    {
        $this->bankService->destroy($id, $request);
        return redirect()->route('banks.index');
    }

    
    /**
     * Devuelve la vista con los respectivos datos.
     *
     * @param  string $view
     * @param  array  $data
     *
     * @return  Illuminate\Http\Response
     */
    protected function view(string $view, array $data = [])
    {
        return view($this->viewsDir.'.'.$view, $data);
    }
}
