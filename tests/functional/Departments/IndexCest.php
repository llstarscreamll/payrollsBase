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

namespace Departments;

use App\Models\Department;
use FunctionalTester;
use Page\Functional\Departments\Index as Page;
use Page\Functional\Departments\Destroy as DestroyPage;

class IndexCest
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
     * Crear 10, luego eliminar 2 registros de prueba en la base de
     * datos.
     *
     * @return  Illuminate\Database\Eloquent\Collection
     */
    private function createAndSoftDeleteSomeRecords()
    {
        // creo registros de prueba
        factory(Department::class, 10)->create();

        return Department::all(['id'])->take(2)
            ->each(function ($item, $key) {
                $item->delete();
            });
    }

    /**
     * Prueba los datos mostrados en el Index del módulo.
     *
     * @param    FunctionalTester $I
     */
    public function index(FunctionalTester $I)
    {
        $I->wantTo('probar vista index de módulo '.Page::$moduleName);
        
        // creo el registro de prueba
        Page::haveDepartment($I);

        $I->amOnPage(Page::$moduleURL);
        $I->see(Page::$moduleName, Page::$titleElem);

        $indexData = Page::getIndexTableData();

        // veo los respectivos datos en la tabla
        foreach (Page::$tableColumns as $column) {
            $I->see($indexData[$column], Page::$table." tbody tr.item-{$indexData['id']} td.$column");
        }
    }

}