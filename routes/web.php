<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::resource('countries','CountryController');Route::resource('departments','DepartmentController');Route::resource('municipalities','MunicipalityController');Route::resource('identity-card-types','IdentityCardTypeController');Route::resource('company-taxpayer-types','CompanyTaxpayerTypeController');Route::resource('legal-company-natures','LegalCompanyNatureController');Route::resource('legal-person-natures','LegalPersonNatureController');Route::resource('companies','CompanyController');Route::resource('branches','BranchController');Route::resource('employee-taxpayer-types','EmployeeTaxpayerTypeController');Route::resource('employees','EmployeeController');Route::resource('user-concepts','UserConceptController');