<?php
namespace devskyfly\yiiModuleIitReport\models;

use app\models\moduleAdminPanel\contentPanel\unnamedEntity\UnnamedEntity;
use devskyfly\yiiModuleAdminPanel\models\contentPanel\AbstractEntity;
use yii\helpers\ArrayHelper;

/**
 * 
 * @author devskyfly
 * @param $data
 * @param $_region__id
 */
class Rate extends AbstractEntity
{
    public static function tableName()
    {
        return 'iit_report_rate';
    }
    
    public function rules()
    {
        $rules=parent::rules();
        $new_rules=[
            [['data'],'string'],
            [['_region__id'],'string']
        ];
        $rules=ArrayHelper::merge($rules, $new_rules);
        return $rules;
    }
    
    protected static function sectionCls()
    {
        return null;
    }

}