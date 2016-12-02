<?php

/**
 * Este archivo es parte de .
 * (c) Johan Alvarez <llstarscreamll@hotmail.com>
 * Licensed under The MIT License (MIT).
 *
 * @package    
 * @version    0.1
 * @author     Johan Alvarez
 * @license    The MIT License (MIT)
 * @copyright  (c) 2015-2016, Johan Alvarez <llstarscreamll@hotmail.com>
 * @link       https://github.com/llstarscreamll
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\DepartmentService;
use App\Http\Requests\DepartmentRequest;
use App\Http\Controllers\Controller;

/**
 * Clase DepartmentController
 *
 * @author  Johan Alvarez <llstarscreamll@hotmail.com>
 */
class DepartmentController extends Controller
{
    /**
     * El directorio donde están las vistas.
     *
     * @var  String
     */
    private $viewsDir = "departments";
    
    /**
     * @var  App\Services\DepartmentService
     */
    private $departmentService;
    
    /**
     * Create a new controller instance.
     */
    public function __construct(DepartmentService $departmentService)
    {
        // el usuario debe estar autenticado para acceder al controlador
        $this->middleware('auth');
        // el usuario debe tener permisos para acceder al controlador
        $this->middleware('permission', ['except' => ['store', 'update']]);
        $this->departmentService = $departmentService;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\DepartmentRequest $request
     *
     * @return  Illuminate\Http\Response
     */
    public function index(DepartmentRequest $request)
    {
        $data = $this->departmentService->getIndexTableData($request);
        $data['records'] = $this->departmentService->indexSearch($request);

        return $this->view('index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return  Illuminate\Http\Response
     */
    public function create()
    {
        $data = $this->departmentService->getCreateFormData();
        return $this->view('create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param    App\Http\Requests\DepartmentRequest  $request
     *
     * @return  Illuminate\Http\Response
     */
    public function store(DepartmentRequest $request)
    {
        $this->departmentService->store($request);
        return redirect()->route('departments.index');
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
        $data = $this->departmentService->getShowFormData($id);
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
        $data = $this->departmentService->getEditFormData($id);
        return $this->view('edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @param  App\Http\Requests\DepartmentRequest $request
     *
     * @return  Illuminate\Http\Response
     */
    public function update(int $id, DepartmentRequest $request)
    {
        $this->departmentService->update($id, $request);
        
        if ($request->isXmlHttpRequest()) {
            return response('ok!!', 204);
        }

        return redirect()->route('departments.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @param  App\Http\Requests\DepartmentRequest $request
     *
     * @return  Illuminate\Http\Response
     */
    public function destroy(int $id, DepartmentRequest $request)
    {
        $this->departmentService->destroy($id, $request);
        return redirect()->route('departments.index');
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
