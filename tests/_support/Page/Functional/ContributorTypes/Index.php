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

namespace Page\Functional\ContributorTypes;

use FunctionalTester;
use llstarscreamll\Core\Models\User;

class Index{
    /**
     * La URL del index del módulo.
     *
     * @var  string
     */
    public static $moduleURL = '/contributor-types';

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
    public static $moduleName = 'Tipos de aportante';
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
    public static $contributorTypeData = array();

    /**
     * Las columnas por defecto a mostrar en la tabla del Index.
     *
     * @var  array
     */
    public static $tableColumns = [
        'name',
        'short_name',
    ];

    /**
     * Los campos del formulario de creación.
     *
     * @var  array
     */
    public static $createFormFields = [
        'name',
        'short_name',
    ];

     /**
     * Los campos del formulario de edición.
     *
     * @var  array
     */
    public static $editFormFields = [
        'name',
        'short_name',
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
        \Artisan::call('db:seed', ['--class' => 'ContributorTypePermissionsSeeder']);
        \Artisan::call('db:seed', ['--class' => 'RoleTableSeeder']);
        // creamos usuario admin de prueba
        \Artisan::call('db:seed', ['--class' => 'DefaultUsersTableSeeder']);

        // damos valores a los atributos para crear un registro
        static::$contributorTypeData = [
            'id' => 1,
            'name' => 'Foo',
            'short_name' => 'Bar',
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
    public static function haveContributorType(FunctionalTester $I)
    {
        return $I->haveRecord('contributor_types', static::$contributorTypeData);
    }

    /**
     * Devuelve array con los datos para creación de un registro.
     *
     * @return  array
     */
    public static function getCreateData()
    {
        $data = array();

        foreach (static::$contributorTypeData as $key => $value) {
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
        $data = static::$contributorTypeData;

        // los datos de las llaves foráneas
        
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
        $data = !empty($data) ? $data : static::$contributorTypeData;

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
        $data = !empty($data) ? $data : static::$contributorTypeData;
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
