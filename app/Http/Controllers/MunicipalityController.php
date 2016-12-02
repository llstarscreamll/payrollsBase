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
use App\Services\MunicipalityService;
use App\Http\Requests\MunicipalityRequest;
use App\Http\Controllers\Controller;

/**
 * Clase MunicipalityController
 *
 * @author  Johan Alvarez <llstarscreamll@hotmail.com>
 */
class MunicipalityController extends Controller
{
    /**
     * El directorio donde están las vistas.
     *
     * @var  String
     */
    private $viewsDir = "municipalities";
    
    /**
     * @var  App\Services\MunicipalityService
     */
    private $municipalityService;
    
    /**
     * Create a new controller instance.
     */
    public function __construct(MunicipalityService $municipalityService)
    {
        // el usuario debe estar autenticado para acceder al controlador
        $this->middleware('auth');
        // el usuario debe tener permisos para acceder al controlador
        $this->middleware('permission', ['except' => ['store', 'update']]);
        $this->municipalityService = $municipalityService;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\MunicipalityRequest $request
     *
     * @return  Illuminate\Http\Response
     */
    public function index(MunicipalityRequest $request)
    {
        $data = $this->municipalityService->getIndexTableData($request);
        $data['records'] = $this->municipalityService->indexSearch($request);

        return $this->view('index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return  Illuminate\Http\Response
     */
    public function create()
    {
        $data = $this->municipalityService->getCreateFormData();
        return $this->view('create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param    App\Http\Requests\MunicipalityRequest  $request
     *
     * @return  Illuminate\Http\Response
     */
    public function store(MunicipalityRequest $request)
    {
        $this->municipalityService->store($request);
        return redirect()->route('municipalities.index');
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
        $data = $this->municipalityService->getShowFormData($id);
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
        $data = $this->municipalityService->getEditFormData($id);
        return $this->view('edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @param  App\Http\Requests\MunicipalityRequest $request
     *
     * @return  Illuminate\Http\Response
     */
    public function update(int $id, MunicipalityRequest $request)
    {
        $this->municipalityService->update($id, $request);
        
        if ($request->isXmlHttpRequest()) {
            return response('ok!!', 204);
        }

        return redirect()->route('municipalities.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @param  App\Http\Requests\MunicipalityRequest $request
     *
     * @return  Illuminate\Http\Response
     */
    public function destroy(int $id, MunicipalityRequest $request)
    {
        $this->municipalityService->destroy($id, $request);
        return redirect()->route('municipalities.index');
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
