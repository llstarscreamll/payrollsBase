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

namespace Page\Functional\ContributorClasses;

use FunctionalTester;

class Show extends Index
{
    /**
     * El título de la página.
     *
     * @var  string
     */
    public static $title = 'Detalles';

    /**
     * El selector del formulario de sólo lectura de los datos.
     *
     * @var  string
     */
    public static $form = 'form[name=show-contributor-classes-form]';

    public function __construct(FunctionalTester $I)
    {
        parent::__construct($I);
    }
}
