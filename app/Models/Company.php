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
        'name' => 'string',
        'identity_card_type_id' => 'int',
        'contributor_identity_card_number' => 'int',
        'verification_digit' => 'int',
        'company_taxpayer_type_id' => 'int',
        'legal_company_nature_id' => 'int',
        'legal_person_nature_id' => 'int',
        'has_branches' => 'boolean',
        'applay_1607_law' => 'boolean',
        'applay_1429_law' => 'boolean',
        'address' => 'string',
        'municipality_id' => 'int',
    ];


    /**
     * La relación con App\Models\IdentityCardType.
     */
    public function identityCardType()
    {
        return $this->belongsTo('App\Models\IdentityCardType', 'identity_card_type_id');
    }
    /**
     * La relación con App\Models\CompanyTaxpayerType.
     */
    public function companyTaxpayerType()
    {
        return $this->belongsTo('App\Models\CompanyTaxpayerType', 'company_taxpayer_type_id');
    }
    /**
     * La relación con App\Models\LegalCompanyNature.
     */
    public function legalCompanyNature()
    {
        return $this->belongsTo('App\Models\LegalCompanyNature', 'legal_company_nature_id');
    }
    /**
     * La relación con App\Models\LegalPersonNature.
     */
    public function legalPersonNature()
    {
        return $this->belongsTo('App\Models\LegalPersonNature', 'legal_person_nature_id');
    }
    /**
     * La relación con App\Models\Municipality.
     */
    public function municipality()
    {
        return $this->belongsTo('App\Models\Municipality', 'municipality_id');
    }
}
