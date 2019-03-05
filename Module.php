<?php
namespace devskyfly\yiiModuleIitReport;

use Yii;
use yii\filters\AccessControl;

class Module extends \yii\base\Module
{
    
    public function init()
    {
        parent::init();
        if(Yii::$app instanceof \yii\console\Application){
            $this->controllerNamespace='devskyfly\yiiModuleIitReport\console';
        }
    }
    
    public function behaviors()
    {
        if(!(Yii::$app instanceof \yii\console\Application)){
            return [
                'access' => [
                    'class' => AccessControl::className(),
                    'except'=>[
                        'rest/*/*',
                    ],
                    'rules' => [
                        [
                            'allow' => true,
                            'roles' => ['@'],
                        ],
                    ],
                ]
            ];
        }else{
            return [];
        }
    }
}