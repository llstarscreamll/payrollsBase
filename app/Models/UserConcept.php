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
 * Clase UserConcept
 *
 * @author  Johan Alvarez <llstarscreamll@hotmail.com>
 */
class UserConcept extends Model
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
    protected $table = 'user_concepts';

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
        'type',
        'is_wage',
        'apply_1393_law',
        'retention',
        'ibc_health',
        'ibc_pension',
        'ibc_arl',
        'ccf_base',
        'sena_base',
        'icbf_base',
        'severance_base',
        'premium_base',
        'provisioning_holiday',
        'money_holiday_base',
        'holidays_enjoyed',
        'holiday_contract_settlement',
        'indemnity',
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
        'type' => 'string',
        'is_wage' => 'boolean',
        'apply_1393_law' => 'boolean',
        'retention' => 'boolean',
        'ibc_health' => 'boolean',
        'ibc_pension' => 'boolean',
        'ibc_arl' => 'boolean',
        'ccf_base' => 'boolean',
        'sena_base' => 'boolean',
        'icbf_base' => 'boolean',
        'severance_base' => 'boolean',
        'premium_base' => 'boolean',
        'provisioning_holiday' => 'boolean',
        'money_holiday_base' => 'boolean',
        'holidays_enjoyed' => 'boolean',
        'holiday_contract_settlement' => 'boolean',
        'indemnity' => 'boolean',
    ];

    /**
     * Los valores de la columna type que es de tipo enum, esto
     * para los casos en que sea utilizada una base de datos sqlite, pues sqlite
     * no soporta campos de tipo enum.
     *
     * @var  string
     */
    protected static $typeColumnEnumValues = "enum('accrual','deduction','not_operate')";

}
