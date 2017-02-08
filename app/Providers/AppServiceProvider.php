<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Repositories\Contracts\EmployeeContributorTypeRepository', 'App\Repositories\EmployeeContributorTypeEloquentRepository');
        $this->app->bind('App\Repositories\Contracts\BranchOfficeRepository', 'App\Repositories\BranchOfficeEloquentRepository');
        $this->app->bind('App\Repositories\Contracts\PilaPaymentOperatorRepository', 'App\Repositories\PilaPaymentOperatorEloquentRepository');
        $this->app->bind('App\Repositories\Contracts\BankRepository', 'App\Repositories\BankEloquentRepository');
        $this->app->bind('App\Repositories\Contracts\ArlCompanyRepository', 'App\Repositories\ArlCompanyEloquentRepository');
        $this->app->bind('App\Repositories\Contracts\PayrollTypeRepository', 'App\Repositories\PayrollTypeEloquentRepository');
        $this->app->bind('App\Repositories\Contracts\ContributorTypeRepository', 'App\Repositories\ContributorTypeEloquentRepository');
        $this->app->bind('App\Repositories\Contracts\ContributorClassRepository', 'App\Repositories\ContributorClassEloquentRepository');
        $this->app->bind('App\Repositories\Contracts\UserConceptRepository', 'App\Repositories\UserConceptEloquentRepository');
        $this->app->bind('App\Repositories\Contracts\EmployeeRepository', 'App\Repositories\EmployeeEloquentRepository');
        $this->app->bind('App\Repositories\Contracts\EmployeeTaxpayerTypeRepository', 'App\Repositories\EmployeeTaxpayerTypeEloquentRepository');
        $this->app->bind('App\Repositories\Contracts\CompanyRepository', 'App\Repositories\CompanyEloquentRepository');
        $this->app->bind('App\Repositories\Contracts\BranchRepository', 'App\Repositories\BranchEloquentRepository');
        $this->app->bind('App\Repositories\Contracts\LegalPersonNatureRepository', 'App\Repositories\LegalPersonNatureEloquentRepository');
        $this->app->bind('App\Repositories\Contracts\LegalCompanyNatureRepository', 'App\Repositories\LegalCompanyNatureEloquentRepository');
        $this->app->bind('App\Repositories\Contracts\CompanyTaxpayerTypeRepository', 'App\Repositories\CompanyTaxpayerTypeEloquentRepository');
        $this->app->bind('App\Repositories\Contracts\IdentityCardTypeRepository', 'App\Repositories\IdentityCardTypeEloquentRepository');
        $this->app->bind('App\Repositories\Contracts\MunicipalityRepository', 'App\Repositories\MunicipalityEloquentRepository');
        $this->app->bind('App\Repositories\Contracts\DepartmentRepository', 'App\Repositories\DepartmentEloquentRepository');
        $this->app->bind('App\Repositories\Contracts\CountryRepository', 'App\Repositories\CountryEloquentRepository');
        //
    }
}
