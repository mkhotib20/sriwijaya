<?php

namespace frontend\controllers;
use backend\models\AlatMusik;
use backend\models\WarnaMusik;
use frontend\components\Filter;

class AlatMusikController extends \frontend\controllers\BaseController
{
    public function actionDetail($slug, $id)
    {
        $model = new AlatMusik();
        $wm_model = new WarnaMusik();
        $data = (object) $model->find()->where(['alat_musik.id' => $id])->select(['alat_musik.*', 'am_kategori.name as kat_nama'])->asArray()
        ->joinWith('am_kategori')->one();
        $data_wms = $wm_model->find()->where(['warna_musik.wm_am' => $id]);
        $data_wm = $data_wms->all();
        $all_am = $model->find()->limit(4)->asArray()->all();
        return $this->render('detail', [
            'data' => $data,
            'all_am' => $all_am,
            'data_wm' => $data_wm,
            'stock' => $data_wms->select(['sum(stock) as stock'])->one()->stock
        ]);
    }
    public function actionIndex($kat=0, $filter=0)
    {
        $src_key = isset($_GET['src_key']) ? $_GET['src_key'] : '';
        $allMusik = AlatMusik::getCount(); 
        $filters = Filter::getFilters();
        if ($kat==0) {
            $countAll = $allMusik; 
            $query = AlatMusik::getQuery(['alat_musik.*', 'am_kategori.name as kat_nama'], [], 'am_kategori',
            $src_key);
        }
        else{
            $countAll = AlatMusik::getCount(['kategori' => $kat]);   
            $query = AlatMusik::getQuery(
                    ['alat_musik.*', 'am_kategori.name as kat_nama'], 
                    ['kategori' => $kat], 'am_kategori',
                    $src_key
                );    
        }
        $query = AlatMusik::getOrderedItems($query, $filter);
        $countAm = AlatMusik::find()->select(['alat_musik.*', 'count(alat_musik.id) as jumlahKat',  'am_kategori.name as namaKat'])
        ->joinWith('am_kategori')->asArray()->groupBy('kategori')->all();
        foreach ($countAm as $key => $value) {
            if ($kat==$value['kategori']) {
                $countAm[$key]['isActive'] = true;
            }
            else{
                $countAm[$key]['isActive'] = false;

            }
        }
        $pages = AlatMusik::getForPagination(['kategori' => $kat], 6);
        $alat_musik = $query->offset($pages->offset)->limit($pages->limit)->all();
        return $this->render('index', [
            'kategori' => $countAm,
            'countAll' => AlatMusik::$count,
            'alat_musik' => $alat_musik,
            'selectedKat' => $kat,
            'allMusik' => $allMusik,
            'pages' => $pages,
            'filters' => $filters,
            'filterSelected' => $filter,
            'query_result' => $this
        ]);
    }
}
