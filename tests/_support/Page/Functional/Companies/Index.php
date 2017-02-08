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

namespace Page\Functional\Companies;

use FunctionalTester;
use llstarscreamll\Core\Models\User;
use App\Models\IdentityCardType;
use App\Models\LegalCompanyNature;
use App\Models\Municipality;
use App\Models\IdentityCardType;
use App\Models\ContributorClass;
use App\Models\ContributorType;
use App\Models\PayrollType;
use App\Models\ArlCompany;
use App\Models\Department;
use App\Models\Bank;
use App\Models\PilaPaymentOperator;

class Index{
    /**
     * La URL del index del módulo.
     *
     * @var  string
     */
    public static $moduleURL = '/companies';

    /**
     * La url del home de la app, para cuando el usuario es redirigido cuando
     * no tiene permisos para realizar alguna acción.
     *
     * @var  string
     */
    public static $homeUrl = '/home';

    /**
     * Nombre del módulo.
     *
     * @var  string
     */
    public static $moduleName = 'Empresas';
    public static $titleElem = 'h2';
    public static $titleSmallElem = 'h2 small';

    /**
     * El prefijo de los campos de búsqueda en la tabla Index.
     *
     * @var  string
     */
    public static $searchFieldsPrefix;

    /**
     * El selector de la tabla donde se listan los registros.
     *
     * @var  string
     */
    public static $table = '.table.table-hover';

    /**
     * El mensaje mostrado al usuario cuando no tiene los permisos para realizar
     * alguna acción.
     *
     * @var  string
     */
    public static $badPermissionsMsg = 'No tienes permisos para realizar esta acción.';
    public static $badPermissionsMsgElem = '.alert.alert-warning';


    /**
     * Mensaje cuando no se encuentran datos.
     *
     * @var  array
     */
    public static $noDataFountMsg = 'No se encontraron registros...';
    public static $noDataFountMsgElem = '.alert.alert-warning';

    /**
     * La info de creación del registro.
     *
     * @var  array
     */
    public static $companyData = array();

    /**
     * Las columnas por defecto a mostrar en la tabla del Index.
     *
     * @var  array
     */
    public static $tableColumns = [
        'name',
        'identity_card_type_id',
        'contributor_identity_card_number',
        'person_type',
        'email',
    ];

    /**
     * Los campos del formulario de creación.
     *
     * @var  array
     */
    public static $createFormFields = [
        'name',
        'identity_card_type_id',
        'contributor_identity_card_number',
        'verification_digit',
        'legal_company_nature_id',
        'person_type',
        'address',
        'municipality_id',
        'dane_activity_code',
        'phone',
        'fax',
        'email',
        'legal_rep_identity_card_type_id',
        'legal_rep_identity_card_number',
        'legal_rep_verification_digit',
        'legal_rep_first_name',
        'legal_rep_middle_name',
        'legal_rep_first_surname',
        'legal_rep_last_surname',
        'legal_rep_email',
        'contact_first_name',
        'contact_last_name',
        'contact_cell_phone',
        'contact_email',
        'contributor_class_id',
        'presentation_form',
        'contributor_type_id',
        'payroll_type_id',
        'arl_company_id',
        'arl_department_id',
        'law_1429_from_2010',
        'law_1607_from_2012',
        'commercial_registration_date',
        'payment_method',
        'bank_id',
        'bank_account_type',
        'bank_account_number',
        'payment_frequency',
        'pila_payment_operator_id',
    ];

     /**
     * Los campos del formulario de edición.
     *
     * @var  array
     */
    public static $editFormFields = [
        'name',
        'identity_card_type_id',
        'contributor_identity_card_number',
        'verification_digit',
        'legal_company_nature_id',
        'person_type',
        'address',
        'municipality_id',
        'dane_activity_code',
        'phone',
        'fax',
        'email',
        'legal_rep_identity_card_type_id',
        'legal_rep_identity_card_number',
        'legal_rep_verification_digit',
        'legal_rep_first_name',
        'legal_rep_middle_name',
        'legal_rep_first_surname',
        'legal_rep_last_surname',
        'legal_rep_email',
        'contact_first_name',
        'contact_last_name',
        'contact_cell_phone',
        'contact_email',
        'contributor_class_id',
        'presentation_form',
        'contributor_type_id',
        'payroll_type_id',
        'arl_company_id',
        'arl_department_id',
        'law_1429_from_2010',
        'law_1607_from_2012',
        'commercial_registration_date',
        'payment_method',
        'bank_id',
        'bank_account_type',
        'bank_account_number',
        'payment_frequency',
        'pila_payment_operator_id',
    ];

    /**
     * Los campos que requieren confirmación.
     *
     * @var  array
     */
    public static $fieldsThatRequieresConfirmation = [
    ];

    /**
     * Los campos a ocultar.
     *
     * @var  array
     */
    public static $hiddenFields = [
    ];

    /**
     * Los datos del usuario que actúa en los tests.
     *
     * @var  array
     */
    public static $adminUser = [
        'name' => 'Travis Orbin',
        'email' => 'travis.orbin@example.com',
        'password' => '123456',
    ];

    /**
     * @var  FunctionalTester
     */
    protected $functionalTester;

    public function __construct(FunctionalTester $I)
    {
        $this->functionalTester = $I;
        static::$searchFieldsPrefix = config('modules.core.app.search-fields-prefix', 'search');

        // creamos permisos de acceso
        \Artisan::call('db:seed', ['--class' => 'CompanyPermissionsSeeder']);
        \Artisan::call('db:seed', ['--class' => 'RoleTableSeeder']);
        // creamos usuario admin de prueba
        \Artisan::call('db:seed', ['--class' => 'DefaultUsersTableSeeder']);
        \Artisan::call('db:seed', ['--class' => 'IdentityCardTypesTableSeeder']);
        \Artisan::call('db:seed', ['--class' => 'LegalCompanyNaturesTableSeeder']);
        \Artisan::call('db:seed', ['--class' => 'MunicipalitiesTableSeeder']);
        \Artisan::call('db:seed', ['--class' => 'IdentityCardTypesTableSeeder']);
        \Artisan::call('db:seed', ['--class' => 'ContributorClassesTableSeeder']);
        \Artisan::call('db:seed', ['--class' => 'ContributorTypesTableSeeder']);
        \Artisan::call('db:seed', ['--class' => 'PayrollTypesTableSeeder']);
        \Artisan::call('db:seed', ['--class' => 'ArlCompaniesTableSeeder']);
        \Artisan::call('db:seed', ['--class' => 'DepartmentsTableSeeder']);
        \Artisan::call('db:seed', ['--class' => 'BanksTableSeeder']);
        \Artisan::call('db:seed', ['--class' => 'PilaPaymentOperatorsTableSeeder']);

        // damos valores a los atributos para crear un registro
        static::$companyData = [
            'id' => 1,
            'name' => 'Acme Inc.',
            'identity_card_type_id' => IdentityCardType::first(['id'])->id,
            'contributor_identity_card_number' => 123,
            'verification_digit' => 1,
            'legal_company_nature_id' => LegalCompanyNature::first(['id'])->id,
            'person_type' => 'Jurídica',
            'address' => 'calle 123',
            'municipality_id' => Municipality::first(['id'])->id,
            'dane_activity_code' => 1,
            'phone' => 123456,
            'fax' => 987654,
            'email' => 'acme@acme.com',
            'legal_rep_identity_card_type_id' => IdentityCardType::first(['id'])->id,
            'legal_rep_identity_card_number' => 1,
            'legal_rep_verification_digit' => 1,
            'legal_rep_first_name' => 'John',
            'legal_rep_middle_name' => 'Sebastian',
            'legal_rep_first_surname' => 'Doe',
            'legal_rep_last_surname' => 'Amir',
            'legal_rep_email' => 'john@example.com',
            'contact_first_name' => 'Alfred',
            'contact_last_name' => 'Brown',
            'contact_cell_phone' => '12364 12354',
            'contact_email' => 'alfred@example.com',
            'contributor_class_id' => ContributorClass::first(['id'])->id,
            'presentation_form' => 'unico',
            'contributor_type_id' => ContributorType::first(['id'])->id,
            'payroll_type_id' => PayrollType::first(['id'])->id,
            'arl_company_id' => ArlCompany::first(['id'])->id,
            'arl_department_id' => Department::first(['id'])->id,
            'law_1429_from_2010' => true,
            'law_1607_from_2012' => '0',
            'commercial_registration_date' => date('Y-m-d'),
            'payment_method' => 'Efectivo',
            'bank_id' => Bank::first(['id'])->id,
            'bank_account_type' => 'corriente',
            'bank_account_number' => '123456789',
            'payment_frequency' => 'Mensual',
            'pila_payment_operator_id' => PilaPaymentOperator::first(['id'])->id,
        ];
    }

    /**
     * Basic route example for your current URL
     * You can append any additional parameter to URL
     * and use it in tests like: Page\Edit::route('/123-post');
     *
     * @param    string  $param
     *
     * @return  string
     */
    public static function route($param)
    {
        return static::$moduleURL.$param;
    }

    /**
     * Crea un registro del modelo en la base de datos.
     *
     * @param    FunctionalTester $I
     *
     * @return  int El id del modelo generado
     */
    public static function haveCompany(FunctionalTester $I)
    {
        return $I->haveRecord('companies', static::$companyData);
    }

    /**
     * Devuelve array con los datos para creación de un registro.
     *
     * @return  array
     */
    public static function getCreateData()
    {
        $data = array();

        foreach (static::$companyData as $key => $value) {
            if (in_array($key, static::$createFormFields)) {
                $data[$key] = $value;
            }
            if (in_array($key, static::$fieldsThatRequieresConfirmation)) {
                $data[$key.'_confirmation'] = $value;
            }
        }

        return $data;
    }

    /**
     * Obtiene los datos que deben estar en la tabla del index, es decir que
     * tenemos que extraer los datos legibles para usuario, como los datos
     * necesarios de las relaciones de la entidad, traducción de campos tipo
     * enum, etc.
     *
     * @return  array
     */
    public static function getIndexTableData()
    {
        $data = static::$companyData;

        // los datos de las llaves foráneas
        $data['identity_card_type_id'] = IdentityCardType::find($data['identity_card_type_id'])->name;
        $data['legal_company_nature_id'] = LegalCompanyNature::find($data['legal_company_nature_id'])->name;
        $data['municipality_id'] = Municipality::find($data['municipality_id'])->name;
        $data['legal_rep_identity_card_type_id'] = IdentityCardType::find($data['legal_rep_identity_card_type_id'])->name;
        $data['contributor_class_id'] = ContributorClass::find($data['contributor_class_id'])->name;
        $data['contributor_type_id'] = ContributorType::find($data['contributor_type_id'])->name;
        $data['payroll_type_id'] = PayrollType::find($data['payroll_type_id'])->name;
        $data['arl_company_id'] = ArlCompany::find($data['arl_company_id'])->name;
        $data['arl_department_id'] = Department::find($data['arl_department_id'])->name;
        $data['bank_id'] = Bank::find($data['bank_id'])->name;
        $data['pila_payment_operator_id'] = PilaPaymentOperator::find($data['pila_payment_operator_id'])->name;
        
        // los atributos ocultos no deben mostrarse en la tabla del index
        foreach (static::$hiddenFields as $key => $attr) {
            if (isset($data[$attr])) {
                unset($data[$attr]);
            }
        }

        return $data;
    }

    /**
     * Resta del parámetro $data los elementos del array static::$hiddenFields.
     *
     * @return  array
     */
    public static function unsetHiddenFields(array $data)
    {
        $data = !empty($data) ? $data : static::$companyData;

        // quitamos del array los elementos de static::$hiddenFields
        foreach (static::$hiddenFields as $key => $value) {
            unset($data[$value]);
        }

        return $data;
    }

    /**
     * Quita del array los indeces que tengan como sufijo "_confirmation" en el
     * nombre.
     *
     * @param    array  $data
     *
     * @return  array
     */
    public static function unsetConfirmationFields(array $data = [])
    {
        $data = !empty($data) ? $data : static::$companyData;
        $confirmedFields = static::$fieldsThatRequieresConfirmation;
        $requiredField = '';

        // los campos ocultos no deben ser mostrados en la vista de sólo lectura
        foreach ($confirmedFields as $key => $value) {
            $requiredField = $value.'_confirmation';
            if (array_key_exists($requiredField, $data)) {
                unset($data[$requiredField]);
            }
        }

        return $data;
    }
}
