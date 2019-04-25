<?php
namespace devskyfly\yiiModuleIitReport\controllers;

use yii\web\Controller;
use devskyfly\yiiModuleIitReport\Module;
use devskyfly\yiiModuleIitReport\models\common\ModuleNavigation;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use devskyfly\yiiModuleIitReport\models\Rate;
use devskyfly\yiiModuleIitReport\models\Region;
use Yii;
use yii\helpers\FileHelper;
use yii\helpers\Json;

class DefaultController extends Controller
{
    public function actionIndex()
    {
        $title=Module::TITLE;
        $module_navigation=new ModuleNavigation();
        $list=[$module_navigation->getData()];
        return $this->render('index',compact("list","title"));
    }
    
    public function actionExcel(){
        
        
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        
        $rates=Rate::find()->where(['active'=>'Y'])->orderBy(['_region__id'=>SORT_ASC])->all();
        
        $sheet->setCellValue('A1', 'Region');
        
        $sheet->setCellValue('B1', 'Base');
        $sheet->setCellValue('C1', 'ИП');
        $sheet->setCellValue('D1', 'Специальный');
        $sheet->setCellValue('E1', 'Общий или смешанный');
        $sheet->setCellValue('F1', 'Бюджет');
        
        $sheet->setCellValue('G1', 'Buh');
        $sheet->setCellValue('H1', '5-10');
        $sheet->setCellValue('I1', '11-20');
        $sheet->setCellValue('J1', '21-50');
        $sheet->setCellValue('K1', '51-100');        
        $sheet->setCellValue('L1', '101 и более');  
        
        $sheet->setCellValue('M1', 'Up');
        $sheet->setCellValue('N1', '1-99');
        $sheet->setCellValue('O1', '10-199');
        $sheet->setCellValue('P1', '200 — 399');
        $sheet->setCellValue('Q1', '400 — 999');
        $sheet->setCellValue('R1', '1000 — 3000');
        $sheet->setCellValue('S1', '3000 и более');
        
        $i=0;
        foreach ($rates as $rate){
            $i++;
            $region=Region::find()->where(['id'=>$rate->_region__id])->one();
            $sheet->setCellValue('A'.($i+1), $region->name);
            
            $data=Json::decode($rate['data']);
            
            $sheet->setCellValue('C'.($i+1), $data['base']['list'][1][2]);
            $sheet->setCellValue('D'.($i+1), $data['base']['list'][2][2]);
            $sheet->setCellValue('E'.($i+1), $data['base']['list'][3][2]);
            $sheet->setCellValue('F'.($i+1), $data['base']['list'][4][2]);
            

            $sheet->setCellValue('H'.($i+1), $data['buh']['list'][1][2]);
            $sheet->setCellValue('I'.($i+1), $data['buh']['list'][2][2]);
            $sheet->setCellValue('J'.($i+1), $data['buh']['list'][3][2]);
            $sheet->setCellValue('K'.($i+1), $data['buh']['list'][4][2]);
            $sheet->setCellValue('L'.($i+1), $data['buh']['list'][5][2]);
            
            $sheet->setCellValue('N'.($i+1), $data['up']['list'][1][2]);
            $sheet->setCellValue('O'.($i+1), $data['up']['list'][2][2]);
            $sheet->setCellValue('P'.($i+1), $data['up']['list'][3][2]);
            $sheet->setCellValue('Q'.($i+1), $data['up']['list'][4][2]);
            $sheet->setCellValue('R'.($i+1), $data['up']['list'][5][2]);       
            $sheet->setCellValue('S'.($i+1), $data['up']['list'][6][2]);       
        }

        $writer = new Xlsx($spreadsheet);
        
        $dir_path=Yii::getAlias('@runtime/templates/iit-partners');
        
        if(!file_exists($dir_path)){
            $result=FileHelper::createDirectory($dir_path);
            if(!$result){
                throw new \Exception('Can\'t create directory '.$dir_path.'.');
            }
        }
        
        $file_path=$dir_path.'/report-rates.xlsx';
        $writer->save($file_path);
        Yii::$app->response->sendFile($file_path);
    }
}