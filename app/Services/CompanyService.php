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

namespace App\Services;

use App\Http\Requests\CompanyRequest;
use App\Repositories\Contracts\CompanyRepository;
use App\Models\Company;
use App\Repositories\Contracts\CompanyTaxpayerTypeRepository;
use App\Repositories\Contracts\IdentityCardTypeRepository;
use App\Repositories\Contracts\LegalCompanyNatureRepository;
use App\Repositories\Contracts\LegalPersonNatureRepository;
use App\Repositories\Contracts\MunicipalityRepository;
use Illuminate\Support\Collection;

/**
 * Clase CompanyService
 *
 * @author Johan Alvarez <llstarscreamll@hotmail.com>
 */
class CompanyService
{
    /**
     * @var App\Repositories\Contracts\CompanyRepository
     */
    private $companyRepository;
    
    /**
     * @var App\Repositories\Contracts\CompanyTaxpayerTypeRepository
     */
    private $companyTaxpayerTypeRepository;
    
    /**
     * @var App\Repositories\Contracts\IdentityCardTypeRepository
     */
    private $identityCardTypeRepository;
    
    /**
     * @var App\Repositories\Contracts\LegalCompanyNatureRepository
     */
    private $legalCompanyNatureRepository;
    
    /**
     * @var App\Repositories\Contracts\LegalPersonNatureRepository
     */
    private $legalPersonNatureRepository;
    
    /**
     * @var App\Repositories\Contracts\MunicipalityRepository
     */
    private $municipalityRepository;

    /**
     * Las columnas predeterminadas a mostrar en la tabla del Index.
     *
     * @var array
     */
    private $defaultSelectedtableColumns = [
        'name',
        'identity_card_type_id',
        'contributor_identity_card_number',
        'verification_digit',
        'company_taxpayer_type_id',
        'legal_company_nature_id',
        'legal_person_nature_id',
        'has_branches',
        'applay_1607_law',
        'applay_1429_law',
        'founded_at',
        'address',
        'municipality_id',
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
     * @param App\Repositories\Contracts\CompanyRepository $companyRepository
     * @param App\Repositories\Contracts\CompanyTaxpayerTypeRepository $companyTaxpayerTypeRepository
     * @param App\Repositories\Contracts\IdentityCardTypeRepository $identityCardTypeRepository
     * @param App\Repositories\Contracts\LegalCompanyNatureRepository $legalCompanyNatureRepository
     * @param App\Repositories\Contracts\LegalPersonNatureRepository $legalPersonNatureRepository
     * @param App\Repositories\Contracts\MunicipalityRepository $municipalityRepository
     */
    public function __construct(CompanyRepository $companyRepository, CompanyTaxpayerTypeRepository $companyTaxpayerTypeRepository, IdentityCardTypeRepository $identityCardTypeRepository, LegalCompanyNatureRepository $legalCompanyNatureRepository, LegalPersonNatureRepository $legalPersonNatureRepository, MunicipalityRepository $municipalityRepository)
    {
        $this->companyRepository = $companyRepository;
        $this->companyTaxpayerTypeRepository = $companyTaxpayerTypeRepository;
        $this->identityCardTypeRepository = $identityCardTypeRepository;
        $this->legalCompanyNatureRepository = $legalCompanyNatureRepository;
        $this->legalPersonNatureRepository = $legalPersonNatureRepository;
        $this->municipalityRepository = $municipalityRepository;
    }

    /**
     * Obtiene datos de consulta predeterminada o lo que indique el usuario de
     * la entidad para la vista Index.
     *
     * @param  App\Http\Requests\CompanyRequest  $request
     *
     * @return Illuminate\Pagination\LengthAwarePaginator
     */
    public function indexSearch(CompanyRequest $request)
    {
        $search = collect($request->get('search'));
        return $this->companyRepository
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
     * @param  App\Http\Requests\CompanyRequest  $request
     *
     * @return array
     */
    public function getIndexTableData(CompanyRequest $request)
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
        $data['company_taxpayer_type_id_list'] = $this->companyTaxpayerTypeRepository->getSelectList();
        $data['identity_card_type_id_list'] = $this->identityCardTypeRepository->getSelectList();
        $data['legal_company_nature_id_list'] = $this->legalCompanyNatureRepository->getSelectList();
        $data['legal_person_nature_id_list'] = $this->legalPersonNatureRepository->getSelectList();
        $data['municipality_id_list'] = $this->municipalityRepository->getSelectList();
    
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
        $company = $this->companyRepository->find($id);
        $data['company'] = $company;
        $data['company_taxpayer_type_id_list'] = $this->companyTaxpayerTypeRepository->getSelectList(
            'id',
            'name',
            (array) $company->company_taxpayer_type_id
        );
        $data['identity_card_type_id_list'] = $this->identityCardTypeRepository->getSelectList(
            'id',
            'name',
            (array) $company->identity_card_type_id
        );
        $data['legal_company_nature_id_list'] = $this->legalCompanyNatureRepository->getSelectList(
            'id',
            'name',
            (array) $company->legal_company_nature_id
        );
        $data['legal_person_nature_id_list'] = $this->legalPersonNatureRepository->getSelectList(
            'id',
            'name',
            (array) $company->legal_person_nature_id
        );
        $data['municipality_id_list'] = $this->municipalityRepository->getSelectList(
            'id',
            'name',
            (array) $company->municipality_id
        );
    
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
        $data['company'] = $this->companyRepository->find($id);
        $data += $this->getCreateFormData();
        
        return $data;
    }

    /**
     * Guarda en base de datos nuevo registro de Empresa.
     *
     * @param  App\Http\Requests\CompanyRequest  $request
     *
     * @return App\Models\Company
     */
    public function store(CompanyRequest $request)
    {
        $input = null_empty_fields($request->all());
        $company = $this->companyRepository->create($input);
        session()->flash('success', trans('company.store_company_success'));

        return $company;
    }

    /**
     * Realiza actualización de Empresa.
     *
     * @param  int  $id
     * @param  App\Http\Requests\CompanyRequest  $request
     *
     * @return  App\Models\Company
     */
    public function update(int $id, CompanyRequest $request)
    {
        $input = null_empty_fields($request->all());
        $company = $this->companyRepository->update($input, $id);
        session()->flash(
            'success',
            trans('company.update_company_success')
        );

        return $company;
    }

    /**
     * Realiza acción de eliminar registro de Empresa.
     *
     * @param  int  $id
     * @param  App\Http\Requests\CompanyRequest  $request
     */
    public function destroy(int $id, CompanyRequest $request)
    {
        $id = $request->has('id') ? $request->get('id') : $id;

        $this->companyRepository->destroy($id);
        session()->flash(
            'success',
            trans_choice('company.destroy_company_success', count($id))
        );
    }
}
