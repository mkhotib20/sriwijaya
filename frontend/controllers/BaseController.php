<?php

namespace frontend\controllers;
use backend\models\AlatMusik;
use backend\models\Kunjungan;
use frontend\components\Filter;
use Yii;

class BaseController extends \yii\web\Controller
{
    public $nowQuarter;
    public $uriParts;

    public function getProduk()
    {
        $uri_parts = explode('?', $_SERVER['REQUEST_URI']);
        $uri_parts = explode('/', $uri_parts[0]);
        $uri_parts = $uri_parts[1];
        return $uri_parts;
    }
    public function getProdukId()
    {
        return isset($_GET['id']) ? $_GET['id'] : null;
    }
    public static function changeUrlParams($url,$parameter,$parameterValue)
    {
        $query = $_GET;
        $query[$parameter] = $parameterValue;
        $query['src_key'] = '';
        $query_result = http_build_query($query);
        $uri_parts = explode('?', $_SERVER['REQUEST_URI'], 2);
        return $uri_parts[0].'?'.$query_result;
    }
    public function genQuarter()
    {
        $hour = date('H', time());
        if ($hour<6) {
            return 1;
        }
        elseif($hour<12){
            return 2;
        }
        elseif($hour<18){
            return 3;
        }
        else{
            return 3;
        }
    }
    public function beforeAction($action)
    {

        $this->nowQuarter = $this->genQuarter();
        $produk = $this->getProduk().'/'.$this->getProdukId();
        $arr = [
            'ip' => $_SERVER['REMOTE_ADDR'],
            'quarter' => $this->nowQuarter,
            'produk' => $produk
        ];
        
        $model = new Kunjungan();
        $exists = $model->find()->where( [ 'ip' => $arr['ip'], 'quarter' => $arr['quarter'], 'produk' => $arr['produk'] ] )->exists();

        if (!$exists) {
            $model->setAttributes($arr);
            $model->save();   
        }
          
        if (!parent::beforeAction($action)) {
            return false;
        }
    
        // other custom code here
    
        return true; 
    }
}