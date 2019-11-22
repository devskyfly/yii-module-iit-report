<?php
namespace devskyfly\yiiModuleIitReport\components;

use devskyfly\php56\types\Obj;
use devskyfly\yiiModuleIitReport\models\Rate;
use devskyfly\yiiModuleIitReport\models\Region;
use yii\base\BaseObject;

class RatesManager extends BaseObject
{
    /**
     * 
     * @param boolean $get_query_result
     * @return \devskyfly\yiiModuleIitReport\models\Rates[]|\yii\db\ActiveQuery
     */
    public static function getAll($get_query_result=true)
    {
        $query=Rate::find()
        ->where(['active'=>'Y'])
        ->orderBy(['name'=>SORT_ASC]);
        
        if($get_query_result){
            return $query->all();
        }else{
            return $query;
        }
    }

    /**
     *
     * @param \devskyfly\yiiModuleIitReport\models\Region $region
     * @throws \InvalidArgumentException
     */
    public static function getByRegion($region)
    {
        if(Obj::isA($region,Region::class)){
            throw new \InvalidArgumentException('Parameter $region is not '.Region::class.'class type.');
        }
        Rate::find(['active'=>'Y','_region__id'=>$region->id])
        ->one();
    }
}