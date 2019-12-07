<?php

namespace backend\controllers;
use backend\models\Kunjungan;

class ApiController extends \yii\web\Controller
{
    public function beforeAction($action)
    {
        if (!parent::beforeAction($action)) {
            return false;
        }
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;    
        return true; 
    }
    
    public function actionTopProduct($type=null, $range=10)
    {
        return Kunjungan::getTopProduct($type, $range);

    }
    public function actionKunjungan($range=7)
    {
        $data = Kunjungan::find()->select(['count(ip) as hitungan', 'DATE_FORMAT(kunjungan.time, "%d-%m-%y") as tgl'])
        ->groupBy(['DATE_FORMAT(kunjungan.time, "%d")'])->orderBy('time ASC')->asArray()->all();
        
        for ($i=0; $i < $range; $i++) { 
            $date = date('d-m-y', strtotime('-'.$i.' days'));   
            $arrDate[$i]['tgl'] = $date;
            for($j=0; $j<count($data); $j++){
                // $arrDate[$i]['is'] = $data[$j]['tgl'];
                if ($date==$data[$j]['tgl']) {
                    $arrDate[$i]['hitungan'] = $data[$j]['hitungan'];
                    break;
                }
                else{
                    $arrDate[$i]['hitungan'] = 0;
                }
            } 
        }
        return $arrDate;    
    }

}