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

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

/**
 * Clase Company
 *
 * @author  Johan Alvarez <llstarscreamll@hotmail.com>
 */
class Company extends Model
{

    /**
     * El nombre de la conexión a la base de datos del modelo.
     *
     * @var  string
     */
    // protected $connection = 'connection-name';
    
    /**
     * La tabla asociada al modelo.
     *
     * @var  string
     */
    protected $table = 'companies';

    /**
     * La llave primaria del modelo.
     *
     * @var  string
     */
    protected $primaryKey = 'id';

    /**
     * Los atributos asignables (mass assignable).
     *
     * @var  array
     */
    protected $fillable = [
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
     * Los atributos ocultos al usuario.
     *
     * @var  array
     */
    protected $hidden = [
    ];

    /**
     * Indica si Eloquent debe gestionar los timestamps en el modelo.
     *
     * @var  bool
     */
    public $timestamps = false;
    
    /**
     * Los atributos que deben ser convertidos a fechas (Carbon).
     *
     * @var  array
     */
    protected $dates = [
    ];

    /**
     * El formato de almacenamiento de las columnas de tipo fecha del modelo.
     *
     * @var  string
     */
    protected $dateFormat = 'Y-m-d H:i:s';

    /**
     * Los "accessors" a adjuntar al modelo cuando sea convertido a array o Json.
     *
     * @var  array
     */
    protected $appends = [];

    /**
     * Casting de atributos a los tipos de datos nativos.
     *
     * @var  array
     */
    public $casts = [
        'id' => 'int',
        'name' => 'string',
        'identity_card_type_id' => 'int',
        'contributor_identity_card_number' => 'int',
        'verification_digit' => 'int',
        'legal_company_nature_id' => 'int',
        'person_type' => 'string',
        'address' => 'string',
        'municipality_id' => 'int',
        'dane_activity_code' => 'string',
        'phone' => 'string',
        'fax' => 'string',
        'email' => 'string',
        'legal_rep_identity_card_type_id' => 'int',
        'legal_rep_identity_card_number' => 'int',
        'legal_rep_verification_digit' => 'int',
        'legal_rep_first_name' => 'string',
        'legal_rep_middle_name' => 'string',
        'legal_rep_first_surname' => 'string',
        'legal_rep_last_surname' => 'string',
        'legal_rep_email' => 'string',
        'contact_first_name' => 'string',
        'contact_last_name' => 'string',
        'contact_cell_phone' => 'string',
        'contact_email' => 'string',
        'contributor_class_id' => 'int',
        'presentation_form' => 'string',
        'contributor_type_id' => 'int',
        'payroll_type_id' => 'int',
        'arl_company_id' => 'int',
        'arl_department_id' => 'int',
        'law_1429_from_2010' => 'boolean',
        'law_1607_from_2012' => 'boolean',
        'payment_method' => 'string',
        'bank_id' => 'int',
        'bank_account_type' => 'string',
        'bank_account_number' => 'string',
        'payment_frequency' => 'string',
        'pila_payment_operator_id' => 'int',
    ];


    /**
     * La relación con App\Models\IdentityCardType.
     */
    public function identityCardType()
    {
        return $this->belongsTo('App\Models\IdentityCardType', 'identity_card_type_id');
    }
    /**
     * La relación con App\Models\LegalCompanyNature.
     */
    public function legalCompanyNature()
    {
        return $this->belongsTo('App\Models\LegalCompanyNature', 'legal_company_nature_id');
    }
    /**
     * La relación con App\Models\Municipality.
     */
    public function municipality()
    {
        return $this->belongsTo('App\Models\Municipality', 'municipality_id');
    }
    /**
     * La relación con App\Models\IdentityCardType.
     */
    public function legalRepentityCardType()
    {
        return $this->belongsTo('App\Models\IdentityCardType', 'legal_rep_identity_card_type_id');
    }
    /**
     * La relación con App\Models\ContributorClass.
     */
    public function contributorClass()
    {
        return $this->belongsTo('App\Models\ContributorClass', 'contributor_class_id');
    }
    /**
     * La relación con App\Models\ContributorType.
     */
    public function contributorType()
    {
        return $this->belongsTo('App\Models\ContributorType', 'contributor_type_id');
    }
    /**
     * La relación con App\Models\PayrollType.
     */
    public function payrollType()
    {
        return $this->belongsTo('App\Models\PayrollType', 'payroll_type_id');
    }
    /**
     * La relación con App\Models\ArlCompany.
     */
    public function arlCompany()
    {
        return $this->belongsTo('App\Models\ArlCompany', 'arl_company_id');
    }
    /**
     * La relación con App\Models\Department.
     */
    public function arlDepartment()
    {
        return $this->belongsTo('App\Models\Department', 'arl_department_id');
    }
    /**
     * La relación con App\Models\Bank.
     */
    public function bank()
    {
        return $this->belongsTo('App\Models\Bank', 'bank_id');
    }
    /**
     * La relación con App\Models\PilaPaymentOperator.
     */
    public function pilaPaymentOperator()
    {
        return $this->belongsTo('App\Models\PilaPaymentOperator', 'pila_payment_operator_id');
    }
}
