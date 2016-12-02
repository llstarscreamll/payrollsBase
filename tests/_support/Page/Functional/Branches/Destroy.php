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

namespace Page\Functional\Branches;

use FunctionalTester;

class Destroy extends Index
{
    /**
     * El botón de eliminar.
     *
     * @var  string
     */
    public static $deleteBtn = 'Eliminar';
    public static $deleteBtnElem = 'button.btn.btn-danger';

    /**
     * Botón de eliminar varios registros.
     *
     * @var  string
     */
    public static $deleteManyBtn = 'Eliminar seleccionados';
    public static $deleteManyBtnElem = 'button.btn.btn-default.btn-sm';

    /**
     * Mensaje de éxito al eliminar un registro.
     *
     * @var  string
     */
    public static $msgSuccess = 'Sucursal eliminado correctamente.';
    public static $msgSuccessElem = '.alert.alert-success';

    public function __construct(FunctionalTester $I)
    {
        parent::__construct($I);
    }
}