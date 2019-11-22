<?php
namespace devskyfly\yiiModuleIitReport\models;

use app\models\moduleAdminPanel\contentPanel\unnamedEntity\UnnamedEntity;
use devskyfly\yiiModuleAdminPanel\models\contentPanel\AbstractEntity;
use yii\helpers\ArrayHelper;

/**
 * 
 * @author devskyfly
 * @param $str_nmb
 */
class Region extends AbstractEntity
{
    public static function tableName()
    {
        return 'iit_report_region';
    }
    
    public function rules()
    {
        $rules=parent::rules();
        $new_rules=[[['str_nmb'],'string']];
        $rules=ArrayHelper::merge($rules, $new_rules);
        return $rules;
    }
    
    protected static function sectionCls()
    {
        return null;
    }

    /**
     * {@inheritdoc}
     * @see devskyfly\yiiModuleAdminPanel\models\contentPanel\AbstractItem::selectListRoute()
     * Здесь прописывается роут к списку выбора
     */
    public static function selectListRoute()
    {
        return "/iit-report/regions/entity-select-list";
    }
}