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
use App\Services\LegalCompanyNatureService;
use App\Http\Requests\LegalCompanyNatureRequest;
use App\Http\Controllers\Controller;

/**
 * Clase LegalCompanyNatureController
 *
 * @author  Johan Alvarez <llstarscreamll@hotmail.com>
 */
class LegalCompanyNatureController extends Controller
{
    /**
     * El directorio donde están las vistas.
     *
     * @var  String
     */
    private $viewsDir = "legalCompanyNatures";
    
    /**
     * @var  App\Services\LegalCompanyNatureService
     */
    private $legalCompanyNatureService;
    
    /**
     * Create a new controller instance.
     */
    public function __construct(LegalCompanyNatureService $legalCompanyNatureService)
    {
        // el usuario debe estar autenticado para acceder al controlador
        $this->middleware('auth');
        // el usuario debe tener permisos para acceder al controlador
        $this->middleware('permission', ['except' => ['store', 'update']]);
        $this->legalCompanyNatureService = $legalCompanyNatureService;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\LegalCompanyNatureRequest $request
     *
     * @return  Illuminate\Http\Response
     */
    public function index(LegalCompanyNatureRequest $request)
    {
        $data = $this->legalCompanyNatureService->getIndexTableData($request);
        $data['records'] = $this->legalCompanyNatureService->indexSearch($request);

        return $this->view('index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return  Illuminate\Http\Response
     */
    public function create()
    {
        $data = $this->legalCompanyNatureService->getCreateFormData();
        return $this->view('create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param    App\Http\Requests\LegalCompanyNatureRequest  $request
     *
     * @return  Illuminate\Http\Response
     */
    public function store(LegalCompanyNatureRequest $request)
    {
        $this->legalCompanyNatureService->store($request);
        return redirect()->route('legal-company-natures.index');
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
        $data = $this->legalCompanyNatureService->getShowFormData($id);
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
        $data = $this->legalCompanyNatureService->getEditFormData($id);
        return $this->view('edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @param  App\Http\Requests\LegalCompanyNatureRequest $request
     *
     * @return  Illuminate\Http\Response
     */
    public function update(int $id, LegalCompanyNatureRequest $request)
    {
        $this->legalCompanyNatureService->update($id, $request);
        
        if ($request->isXmlHttpRequest()) {
            return response('ok!!', 204);
        }

        return redirect()->route('legal-company-natures.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @param  App\Http\Requests\LegalCompanyNatureRequest $request
     *
     * @return  Illuminate\Http\Response
     */
    public function destroy(int $id, LegalCompanyNatureRequest $request)
    {
        $this->legalCompanyNatureService->destroy($id, $request);
        return redirect()->route('legal-company-natures.index');
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
