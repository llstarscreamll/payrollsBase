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

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use llstarscreamll\Core\Traits\EnumValues;

/**
 * Clase Employee
 *
 * @author  Johan Alvarez <llstarscreamll@hotmail.com>
 */
class Employee extends Model
{
    use EnumValues;

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
    protected $table = 'employees';

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
        'dni',
        'name',
        'lastname',
        'branch_id',
        'contract_type',
        'salary',
        'salary_type',
        'occupational_risk_level',
        'employee_taxpayer_type_id',
        'dependents_deduction',
        'average_EPS_contributions_last_year',
        'home_interest_deduction_last_year',
        'prepaid_medicine',
        'applay_2090_decree',
        'contributor_subtype',
        'admitted_at',
        'egressed_at',
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
    public $timestamps = true;
    
    /**
     * Los atributos que deben ser convertidos a fechas (Carbon).
     *
     * @var  array
     */
    protected $dates = [
        'created_at',
        'updated_at',
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
        'dni' => 'int',
        'name' => 'string',
        'lastname' => 'string',
        'branch_id' => 'int',
        'contract_type' => 'string',
        'salary' => 'int',
        'salary_type' => 'string',
        'occupational_risk_level' => 'string',
        'employee_taxpayer_type_id' => 'int',
        'dependents_deduction' => 'int',
        'average_EPS_contributions_last_year' => 'int',
        'home_interest_deduction_last_year' => 'int',
        'prepaid_medicine' => 'int',
        'applay_2090_decree' => 'boolean',
        'contributor_subtype' => 'boolean',
    ];

    /**
     * Los valores de la columna contract_type que es de tipo enum, esto
     * para los casos en que sea utilizada una base de datos sqlite, pues sqlite
     * no soporta campos de tipo enum.
     *
     * @var  string
     */
    protected static $contract_typeColumnEnumValues = "enum('I','F','L')";
    /**
     * Los valores de la columna salary_type que es de tipo enum, esto
     * para los casos en que sea utilizada una base de datos sqlite, pues sqlite
     * no soporta campos de tipo enum.
     *
     * @var  string
     */
    protected static $salary_typeColumnEnumValues = "enum('I','O1','O2')";
    /**
     * Los valores de la columna occupational_risk_level que es de tipo enum, esto
     * para los casos en que sea utilizada una base de datos sqlite, pues sqlite
     * no soporta campos de tipo enum.
     *
     * @var  string
     */
    protected static $occupational_risk_levelColumnEnumValues = "enum('I','II','III','IV','V')";

    /**
     * La relación con App\Models\Branch.
     */
    public function branch()
    {
        return $this->belongsTo('App\Models\Branch', 'branch_id');
    }
    /**
     * La relación con App\Models\EmployeeTaxpayerType.
     */
    public function employeeTaxpayerType()
    {
        return $this->belongsTo('App\Models\EmployeeTaxpayerType', 'employee_taxpayer_type_id');
    }
}
