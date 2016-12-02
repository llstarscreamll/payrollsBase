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

namespace Branches;

use FunctionalTester;
use Page\Functional\Branches\Show as Page;

class ShowCest
{
    /**
     * Las acciones a realizar antes de cada test.
     *
     * @param    FunctionalTester $I
     */
    public function _before(FunctionalTester $I)
    {
        new Page($I);
        $I->amLoggedAs(Page::$adminUser);
    }

    /**
     * Prueba la funcionalidad de consultar la información de un modelo, sólo
     * lectura.
     *
     * @param    FunctionalTester $I
     */
    public function show(FunctionalTester $I)
    {
        $I->wantTo('ver detalles de registro en módulo '.Page::$moduleName);

        // creo el registro de prueba
        Page::haveBranch($I);

        // voy a la página de detalles del registro
        $I->amOnPage(Page::route('/'.Page::$branchData['id']));
        // veo el título de la página
        $I->see(Page::$moduleName, Page::$titleElem);
        $I->see(Page::$title, Page::$titleSmallElem);

        // los datos del formulario
        $formData = Page::$branchData;
        $formData = Page::unsetHiddenFields($formData);

        // veo los campos correspondientes en el formulario
        foreach ($formData as $name => $value) {
            $I->seeElement("*[name=$name]");
        }

        // veo los datos del registro en el formulario de sólo lectura
        $I->seeInFormFields(Page::$form, $formData);
    }
}