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

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CompanyTaxpayerTypeService;
use App\Http\Requests\CompanyTaxpayerTypeRequest;
use App\Http\Controllers\Controller;

/**
 * Clase CompanyTaxpayerTypeController
 *
 * @author  Johan Alvarez <llstarscreamll@hotmail.com>
 */
class CompanyTaxpayerTypeController extends Controller
{
    /**
     * El directorio donde están las vistas.
     *
     * @var  String
     */
    private $viewsDir = "companyTaxpayerTypes";
    
    /**
     * @var  App\Services\CompanyTaxpayerTypeService
     */
    private $companyTaxpayerTypeService;
    
    /**
     * Create a new controller instance.
     */
    public function __construct(CompanyTaxpayerTypeService $companyTaxpayerTypeService)
    {
        // el usuario debe estar autenticado para acceder al controlador
        $this->middleware('auth');
        // el usuario debe tener permisos para acceder al controlador
        $this->middleware('permission', ['except' => ['store', 'update']]);
        $this->companyTaxpayerTypeService = $companyTaxpayerTypeService;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\CompanyTaxpayerTypeRequest $request
     *
     * @return  Illuminate\Http\Response
     */
    public function index(CompanyTaxpayerTypeRequest $request)
    {
        $data = $this->companyTaxpayerTypeService->getIndexTableData($request);
        $data['records'] = $this->companyTaxpayerTypeService->indexSearch($request);

        return $this->view('index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return  Illuminate\Http\Response
     */
    public function create()
    {
        $data = $this->companyTaxpayerTypeService->getCreateFormData();
        return $this->view('create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param    App\Http\Requests\CompanyTaxpayerTypeRequest  $request
     *
     * @return  Illuminate\Http\Response
     */
    public function store(CompanyTaxpayerTypeRequest $request)
    {
        $this->companyTaxpayerTypeService->store($request);
        return redirect()->route('company-taxpayer-types.index');
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
        $data = $this->companyTaxpayerTypeService->getShowFormData($id);
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
        $data = $this->companyTaxpayerTypeService->getEditFormData($id);
        return $this->view('edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @param  App\Http\Requests\CompanyTaxpayerTypeRequest $request
     *
     * @return  Illuminate\Http\Response
     */
    public function update(int $id, CompanyTaxpayerTypeRequest $request)
    {
        $this->companyTaxpayerTypeService->update($id, $request);
        
        if ($request->isXmlHttpRequest()) {
            return response('ok!!', 204);
        }

        return redirect()->route('company-taxpayer-types.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @param  App\Http\Requests\CompanyTaxpayerTypeRequest $request
     *
     * @return  Illuminate\Http\Response
     */
    public function destroy(int $id, CompanyTaxpayerTypeRequest $request)
    {
        $this->companyTaxpayerTypeService->destroy($id, $request);
        return redirect()->route('company-taxpayer-types.index');
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
