<?php
namespace devskyfly\yiiModuleIitReport;

use Yii;
use yii\filters\AccessControl;

class Module extends \yii\base\Module
{
    const CSS_NAMESPACE='devskyfly-yii-iit-report';
    const TITLE="Модуль \"Отчетность\"";
    
    public function init()
    {
        parent::init();
        Yii::setAlias("@devskyfly/yiiModuleIitReport", __DIR__);
        if(Yii::$app instanceof \yii\console\Application){
            $this->controllerNamespace='devskyfly\yiiModuleIitReport\console';
        }
    }
    
    public function behaviors()
    {
        if(!(Yii::$app instanceof \yii\console\Application)){
            if(!YII_DEBUG){
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
            }
            else{
                return [];
            }
        }else{
            return [];
        }
    }
}