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

namespace UserConcepts;

use App\Models\UserConcept;
use FunctionalTester;
use Page\Functional\UserConcepts\Destroy as Page;

class DestroyCest
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
     * Prueba la funcionalidad de eliminar un registro.
     *
     * @param    FunctionalTester $I
     * @group    Payrolls
     */ 
    public function delete(FunctionalTester $I)
    {
        $I->wantTo('eliminar registro en módulo '.Page::$moduleName);

        // creo registro de prueba
        Page::haveUserConcept($I);

        // voy a la página de detalles del registro y doy clic al botón
        // "Eliminar"
        $I->amOnPage(Page::route('/'.Page::$userConceptData['id']));
        $I->click(Page::$deleteBtn, Page::$deleteBtnElem);

        // soy redirigido al Index y debo ver mensaje de éxito en la operación
        $I->seeCurrentUrlEquals(Page::$moduleURL);
        $I->see(Page::$msgSuccess, Page::$msgSuccessElem);
        // no debe haber datos que mostrar
        $I->see(Page::$noDataFountMsg, Page::$noDataFountMsgElem);
    }

    /**
     * Prueba la funcionalidad de eliminar varios registros a la vez.
     *
     * @param    FunctionalTester $I
     * @group    Payrolls
     */ 
    public function deleteMany(FunctionalTester $I)
    {
        $I->wantTo('eliminar varios registros a la vez en módulo '.Page::$moduleName);

        // creo registros de prueba
        $userConcepts = factory(UserConcept::class, 10)->create();

        // cuando cargo el Index el botón "Eliminar" debe
        // ser mostrado
        $I->amOnPage(Page::$moduleURL);
        $I->see(Page::$deleteManyBtn, Page::$deleteManyBtnElem);
        
        // cargo la ruta que "Eliminar" los registros
        $I->submitForm('#deletemanyForm', [
            'id' => $userConcepts->pluck('id')->toArray()
        ]);
        $I->dontSeeFormErrors();
        
        // soy redirigido al Index y no debe haber datos que mostrar
        $I->seeCurrentUrlEquals(Page::$moduleURL);
        $I->see(Page::$noDataFountMsg, Page::$noDataFountMsgElem);
    }
}