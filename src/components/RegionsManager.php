<?php
namespace devskyfly\yiiModuleIitReport\components;

use devskyfly\php56\types\Str;
use devskyfly\yiiModuleIitPartners\models\Region;
use yii\base\BaseObject;

class RegionsManager extends BaseObject
{
    /**
     * 
     * @param boolean $get_query_result
     * @return \devskyfly\yiiModuleIitReport\models\Region[]|\yii\db\ActiveQuery
     */
    public static function getAll($get_query_result=true)
    {
        $rates_query=RatesManager::getAll(false);
        
        $regions_ids=$rates_query->asArray()->getColumn('_region__id');
        $regions_ids=array_unique($regions_ids);
        
        $query=Region::find()->where(['active'=>'Y','id'=>$regions_ids]);
        
        if($get_query_result){
            return $query->all();
        }else{
            return $query;
        }
    }
    
    /**
     *
     * @param string $str_nmb
     * @throws \InvalidArgumentException
     * @return \devskyfly\yiiModuleIitReport\models\Region|NULL
     */
    public static function getByStrNmb($str_nmb)
    {
        if(!Str::isString($str_nmb)){
            throw new \InvalidArgumentException('Parameter $str_nmb is not string type.');
        }
        if(!strlen($str_nmb)){
            throw new \InvalidArgumentException('Parameter $str_nmb is wrong length.');
        }
        
        return Region::find()
        ->where(['active'=>'Y','str_nmb'=>$str_nmb])
        ->one();
    }
}