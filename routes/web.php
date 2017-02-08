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

Route::get(
    '/',
    function () {
        return view('welcome');
    }
);
Route::resource('countries', 'CountryController');
Route::resource('departments', 'DepartmentController');
Route::resource('municipalities', 'MunicipalityController');
Route::resource('identity-card-types', 'IdentityCardTypeController');
Route::resource('company-taxpayer-types', 'CompanyTaxpayerTypeController');
Route::resource('legal-company-natures', 'LegalCompanyNatureController');
Route::resource('companies', 'CompanyController');
Route::resource('contributor-classes', 'ContributorClassController');
Route::resource('identity-card-types', 'IdentityCardTypeController');
Route::resource('legal-company-natures', 'LegalCompanyNatureController');
Route::resource('contributor-types', 'ContributorTypeController');
Route::resource('payroll-types', 'PayrollTypeController');
Route::resource('arl-companies', 'ArlCompanyController');
Route::resource('banks', 'BankController');
Route::resource('pila-payment-operators', 'PilaPaymentOperatorController');
Route::resource('branch-offices', 'BranchOfficeController');
Route::resource('employee-contributor-types', 'EmployeeContributorTypeController');
