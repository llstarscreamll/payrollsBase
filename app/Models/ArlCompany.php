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
 * Clase ArlCompany
 *
 * @author  Johan Alvarez <llstarscreamll@hotmail.com>
 */
class ArlCompany extends Model
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
    protected $table = 'arl_companies';

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
        'short_name',
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
        'short_name' => 'string',
    ];


}
