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

namespace Page\Functional\PilaPaymentOperators;

use FunctionalTester;

class Create extends Index
{
    /**
     * La URL de la página.
     *
     * @var  string
     */
    public static $URL = '/pila-payment-operators/create';

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
    public static $createBtn = 'Crear Operador de pago PILA';
    public static $createBtnElem = '.btn.btn-default.btn-sm';

    /**
     * El selector del formulario.
     *
     * @var  string
     */
    public static $form = 'form[name=create-pila-payment-operators-form]';

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
    public static $msgSuccess = 'Operador de pago PILA creado correctamente.';
    public static $msgSuccessElem = '.alert.alert-success';

    public function __construct(FunctionalTester $I)
    {
        parent::__construct($I);
    }
}