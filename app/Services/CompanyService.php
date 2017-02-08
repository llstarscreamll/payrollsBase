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

use App\Http\Requests\CompanyRequest;
use App\Repositories\Contracts\CompanyRepository;
use App\Models\Company;
use App\Repositories\Contracts\ArlCompanyRepository;
use App\Repositories\Contracts\DepartmentRepository;
use App\Repositories\Contracts\BankRepository;
use App\Repositories\Contracts\ContributorClassRepository;
use App\Repositories\Contracts\ContributorTypeRepository;
use App\Repositories\Contracts\IdentityCardTypeRepository;
use App\Repositories\Contracts\LegalCompanyNatureRepository;
use App\Repositories\Contracts\MunicipalityRepository;
use App\Repositories\Contracts\PayrollTypeRepository;
use App\Repositories\Contracts\PilaPaymentOperatorRepository;
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
     * @var App\Repositories\Contracts\ArlCompanyRepository
     */
    private $arlCompanyRepository;
    
    /**
     * @var App\Repositories\Contracts\DepartmentRepository
     */
    private $departmentRepository;
    
    /**
     * @var App\Repositories\Contracts\BankRepository
     */
    private $bankRepository;
    
    /**
     * @var App\Repositories\Contracts\ContributorClassRepository
     */
    private $contributorClassRepository;
    
    /**
     * @var App\Repositories\Contracts\ContributorTypeRepository
     */
    private $contributorTypeRepository;
    
    /**
     * @var App\Repositories\Contracts\IdentityCardTypeRepository
     */
    private $identityCardTypeRepository;
    
    /**
     * @var App\Repositories\Contracts\LegalCompanyNatureRepository
     */
    private $legalCompanyNatureRepository;
    
    /**
     * @var App\Repositories\Contracts\MunicipalityRepository
     */
    private $municipalityRepository;
    
    /**
     * @var App\Repositories\Contracts\PayrollTypeRepository
     */
    private $payrollTypeRepository;
    
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
        'identity_card_type_id',
        'contributor_identity_card_number',
        'person_type',
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
     * @param App\Repositories\Contracts\CompanyRepository $companyRepository
     * @param App\Repositories\Contracts\ArlCompanyRepository $arlCompanyRepository
     * @param App\Repositories\Contracts\DepartmentRepository $departmentRepository
     * @param App\Repositories\Contracts\BankRepository $bankRepository
     * @param App\Repositories\Contracts\ContributorClassRepository $contributorClassRepository
     * @param App\Repositories\Contracts\ContributorTypeRepository $contributorTypeRepository
     * @param App\Repositories\Contracts\IdentityCardTypeRepository $identityCardTypeRepository
     * @param App\Repositories\Contracts\LegalCompanyNatureRepository $legalCompanyNatureRepository
     * @param App\Repositories\Contracts\MunicipalityRepository $municipalityRepository
     * @param App\Repositories\Contracts\PayrollTypeRepository $payrollTypeRepository
     * @param App\Repositories\Contracts\PilaPaymentOperatorRepository $pilaPaymentOperatorRepository
     */
    public function __construct(CompanyRepository $companyRepository, ArlCompanyRepository $arlCompanyRepository, DepartmentRepository $departmentRepository, BankRepository $bankRepository, ContributorClassRepository $contributorClassRepository, ContributorTypeRepository $contributorTypeRepository, IdentityCardTypeRepository $identityCardTypeRepository, LegalCompanyNatureRepository $legalCompanyNatureRepository, MunicipalityRepository $municipalityRepository, PayrollTypeRepository $payrollTypeRepository, PilaPaymentOperatorRepository $pilaPaymentOperatorRepository)
    {
        $this->companyRepository = $companyRepository;
        $this->arlCompanyRepository = $arlCompanyRepository;
        $this->departmentRepository = $departmentRepository;
        $this->bankRepository = $bankRepository;
        $this->contributorClassRepository = $contributorClassRepository;
        $this->contributorTypeRepository = $contributorTypeRepository;
        $this->identityCardTypeRepository = $identityCardTypeRepository;
        $this->legalCompanyNatureRepository = $legalCompanyNatureRepository;
        $this->municipalityRepository = $municipalityRepository;
        $this->payrollTypeRepository = $payrollTypeRepository;
        $this->pilaPaymentOperatorRepository = $pilaPaymentOperatorRepository;
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
        $data['arl_company_id_list'] = $this->arlCompanyRepository->getSelectList();
        $data['arl_department_id_list'] = $this->departmentRepository->getSelectList();
        $data['bank_id_list'] = $this->bankRepository->getSelectList();
        $data['contributor_class_id_list'] = $this->contributorClassRepository->getSelectList();
        $data['contributor_type_id_list'] = $this->contributorTypeRepository->getSelectList();
        $data['identity_card_type_id_list'] = $this->identityCardTypeRepository->getSelectList();
        $data['legal_company_nature_id_list'] = $this->legalCompanyNatureRepository->getSelectList();
        $data['legal_rep_identity_card_type_id_list'] = $this->identityCardTypeRepository->getSelectList();
        $data['municipality_id_list'] = $this->municipalityRepository->getSelectList();
        $data['payroll_type_id_list'] = $this->payrollTypeRepository->getSelectList();
        $data['pila_payment_operator_id_list'] = $this->pilaPaymentOperatorRepository->getSelectList();
    
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
        $data['arl_company_id_list'] = $this->arlCompanyRepository->getSelectList(
            'id',
            'name',
            (array) $company->arl_company_id
        );
        $data['arl_department_id_list'] = $this->departmentRepository->getSelectList(
            'id',
            'name',
            (array) $company->arl_department_id
        );
        $data['bank_id_list'] = $this->bankRepository->getSelectList(
            'id',
            'name',
            (array) $company->bank_id
        );
        $data['contributor_class_id_list'] = $this->contributorClassRepository->getSelectList(
            'id',
            'name',
            (array) $company->contributor_class_id
        );
        $data['contributor_type_id_list'] = $this->contributorTypeRepository->getSelectList(
            'id',
            'name',
            (array) $company->contributor_type_id
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
        $data['legal_rep_identity_card_type_id_list'] = $this->identityCardTypeRepository->getSelectList(
            'id',
            'name',
            (array) $company->legal_rep_identity_card_type_id
        );
        $data['municipality_id_list'] = $this->municipalityRepository->getSelectList(
            'id',
            'name',
            (array) $company->municipality_id
        );
        $data['payroll_type_id_list'] = $this->payrollTypeRepository->getSelectList(
            'id',
            'name',
            (array) $company->payroll_type_id
        );
        $data['pila_payment_operator_id_list'] = $this->pilaPaymentOperatorRepository->getSelectList(
            'id',
            'name',
            (array) $company->pila_payment_operator_id
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
