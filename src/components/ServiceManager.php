<?php
namespace devskyfly\yiiModuleIitReport\components;

use yii\base\BaseObject;
use devskyfly\yiiModuleIitReport\models\service\Service;

class ServiceManager extends BaseObject
{
    /**
     * 
     * @param string $slxId
     * @return \yii\db\ActiveRecord|array|NULL
     */
    public static function getBySlxId($slxId)
    {
        return Service::find()->where(['slx_id'=>$slxId])->one();
    }
}