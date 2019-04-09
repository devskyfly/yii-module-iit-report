<?php
namespace devskyfly\yiiModuleIitReport\models\common;

use devskyfly\yiiModuleAdminPanel\models\common\AbstractModuleNavigation;

class ModuleNavigation extends AbstractModuleNavigation
{
    protected function moduleRoute()
    {
        return "/iit-report/";
    }

    protected function moduleList()
    {
        return
        [
            ['name'=>'Тарифы','route'=>'/iit-report/rates/'],
            ['name'=>'Услуги','route'=>'/iit-report/services/'],
            ['name'=>'Регионы','route'=>'/iit-report/regions/'],
        ];
    }

    protected function moduleName()
    {
        return 'iit-report';
    }

}