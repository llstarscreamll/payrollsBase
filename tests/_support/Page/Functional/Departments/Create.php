<?php

/**
 * Este archivo es parte de .
 * (c) Johan Alvarez <llstarscreamll@hotmail.com>
 * Licensed under The MIT License (MIT).
 *
 * @package    
 * @version    0.1
 * @author     Johan Alvarez
 * @license    The MIT License (MIT)
 * @copyright  (c) 2015-2016, Johan Alvarez <llstarscreamll@hotmail.com>
 * @link       https://github.com/llstarscreamll
 */

namespace Page\Functional\Departments;

use FunctionalTester;

class Create extends Index
{
    /**
     * La URL de la página.
     *
     * @var  string
     */
    public static $URL = '/departments/create';

    /**
     * El título de la página.
     *
     * @var  string
     */
    public static $title = 'Crear';

    /**
     * El enlace botón para ir a formulario de creación. El selector puede ser
     * un link <a> o un botón <button>, pero la clase es la misma en los dos.
     *
     * @var  string
     */
    public static $createBtn = 'Crear ';
    public static $createBtnElem = '.btn.btn-default.btn-sm';

    /**
     * El selector del formulario.
     *
     * @var  string
     */
    public static $form = 'form[name=create-departments-form]';

    /**
     * El botón submit del formulario.
     *
     * @var  array
     */
    public static $formBtnElem = 'button.btn.btn-primary';

    /**
     * Mensaje de éxito al crear un registro.
     *
     * @var  array
     */
    public static $msgSuccess = ' creado correctamente.';
    public static $msgSuccessElem = '.alert.alert-success';

    public function __construct(FunctionalTester $I)
    {
        parent::__construct($I);
    }
}