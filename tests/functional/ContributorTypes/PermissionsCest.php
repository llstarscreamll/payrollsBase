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

namespace ContributorTypes;

use FunctionalTester;
use App\Models\ContributorType;
use llstarscreamll\Core\Models\Role;
use llstarscreamll\Core\Models\Permission;
use Page\Functional\ContributorTypes\Index as Page;
use Page\Functional\ContributorTypes\Destroy as DestroyPage;
use Page\Functional\ContributorTypes\Create as CreatePage;
use Page\Functional\ContributorTypes\Edit as EditPage;

class PermissionsCest
{
    /**
     * El id del registro de prueba.
     *
     * @var  int
     */
    protected $contributorTypeId;

    /**
     * Las acciones a realizar antes de cada test.
     *
     * @param    FunctionalTester $I
     */
    public function _before(FunctionalTester $I)
    {
        new Page($I);
        $I->amLoggedAs(Page::$adminUser);

        $permissions = [
            'contributor-types.create',
            'contributor-types.edit',
            'contributor-types.destroy',
        ];

        // quitamos permisos de edición a los roles
        $permission = Permission::whereIn('slug', $permissions)
            ->get(['id'])
            ->pluck('id')
            ->toArray();

        Role::all()->each(function ($item) use ($permission) {
            $item->permissions()->detach($permission);
        });

        // creamos registro de prueba
        $this->contributorTypeId = Page::haveContributorType($I);
    }

    /**
     * Prueba que las restricciones con los permisos de creación funcionen
     * correctamente.
     *
     * @param    FunctionalTester $I
     * @group    Payrolls
     */ 
    public function createPermissions(FunctionalTester $I)
    {
        $I->wantTo('probar permisos de creación en módulo '.Page::$moduleName);

        // no debo ver link de acceso a página de creación en Index
        $I->amOnPage(Page::$moduleURL);
        $I->dontSee(CreatePage::$createBtn, CreatePage::$createBtnElem);

        // si intento acceder a la página soy redirigido al home de la app
        $I->amOnPage(Page::route('/create'));
        $I->seeCurrentUrlEquals(Page::$homeUrl);
        $I->see(Page::$badPermissionsMsg, Page::$badPermissionsMsgElem);
    }

    /**
     * Prueba que las restricciones con los permisos de edición funcionen
     * correctamente.
     *
     * @param    FunctionalTester $I
     * @group    Payrolls
     */ 
    public function editPermissions(FunctionalTester $I)
    {
        $I->wantTo('probar permisos de edición en módulo '.Page::$moduleName);

        // no debo ver link de acceso a página de edición en Index
        $I->amOnPage(Page::$moduleURL);
        $I->dontSee(EditPage::$linkToEdit, 'tbody tr td '.EditPage::$linkToEditElem);

        // el la página de detalles del registro no debo ver el link a página de
        // edición
        $I->amOnPage(Page::route("/$this->contributorTypeId"));
        $I->dontSee(EditPage::$linkToEdit, '.form-group '.EditPage::$linkToEditElem);

        // si intento acceder a la página de edición de un registro soy
        // redirigido al home de la app
        $I->amOnPage(Page::route("/$this->contributorTypeId/edit"));
        $I->seeCurrentUrlEquals(Page::$homeUrl);
        $I->see(Page::$badPermissionsMsg, Page::$badPermissionsMsgElem);
    }

    /**
     * Prueba que las restricciones con los permisos de eliminar     * funcionen correctamente.
     *
     * @param    FunctionalTester $I
     * @group    Payrolls
     */ 
    public function deletePermissions(FunctionalTester $I)
    {
        $I->wantTo('probar permisos de eliminar en módulo '.Page::$moduleName);

        // no debo ver link de acceso a página de edición en Index
        $I->amOnPage(Page::$moduleURL);
        $I->dontSee(DestroyPage::$deleteBtn, DestroyPage::$deleteBtnElem);
        $I->dontSee(DestroyPage::$deleteManyBtn, DestroyPage::$deleteManyBtnElem);
        // en página de detalles del registro no debo ver botón "Mover a Papelera"
        $I->amOnPage(Page::route("/$this->contributorTypeId"));
        $I->dontSee(DestroyPage::$deleteBtn, DestroyPage::$deleteBtnElem);
    }

}