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

namespace EmployeeTaxpayerTypes;

use FunctionalTester;
use Page\Functional\EmployeeTaxpayerTypes\Edit as Page;

class EditCest
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
     * Prueba la funcionalidad de editar la información de un modelo ya creado.
     *
     * @param    FunctionalTester $I
     * @group    Payrolls
     */ 
    public function edit(FunctionalTester $I)
    {
        $I->wantTo('editar un registro en modulo '.Page::$moduleName);

        // creo el registro de prueba
        Page::haveEmployeeTaxpayerType($I);

        // voy a la página de detalles del registro
        $I->amOnPage(Page::route('/'.Page::$employeeTaxpayerTypeData['id']));
        // doy clic al enlace para ir al formulario de edición
        $I->click(Page::$linkToEdit, Page::$linkToEditElem);

        // estoy en la página de edición
        $I->seeCurrentUrlEquals(Page::route('/'.Page::$employeeTaxpayerTypeData['id'].'/edit'));
        $I->see(Page::$moduleName, Page::$titleElem);
        $I->see(Page::$title, Page::$titleSmallElem);

        // los datos del formulario
        $formData = Page::getUpdateFormData();

        // veo los campos correspondientes en el formulario
        foreach ($formData as $name => $value) {
            $I->seeElement("*[name=$name]");
        }

        // veo los datos en el formulario
        $I->seeInFormFields(Page::$form, $formData);

        // envío el formulario con los nuevos datos
        $updateData = Page::getDataToUpdateForm();
        $I->submitForm(Page::$form, $updateData);
        $I->dontSeeFormErrors();

        // soy redirigido al Index del módulo
        $I->seeCurrentUrlEquals(Page::route(''));
        // veo mensaje de confirmación
        $I->see(Page::$msgSuccess, Page::$msgSuccessElem);
        
        // voy a la página de detalles del registro
        $I->amOnPage(Page::route('/'.Page::$employeeTaxpayerTypeData['id']));
        
        // veo los datos actualizados en el formulario de sólo lectura
        $updateData = Page::unsetConfirmationFields($updateData);
        $I->seeInFormFields('form', $updateData);
        $I->seeRecord('employee_taxpayer_types', null_empty_fields($updateData));
    }
}