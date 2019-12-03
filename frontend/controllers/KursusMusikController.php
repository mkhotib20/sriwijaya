<?php

namespace frontend\controllers;
use Yii;
use backend\models\Kursus;
use frontend\components\Filter;
use backend\models\Guru;
use backend\models\KursusKategori;
use backend\models\AlatMusik;
use backend\models\Penghargaan;

class KursusMusikController extends \frontend\controllers\BaseController
{
    public function actionGuru($slug=null, $id=null,$kat=0, $filter=0)
    {
        
        if ($slug!=null) {
            $penghargaan = Penghargaan::find()->where(['p_guru' => $id])->all();
            $data = (object)Guru::find()
            ->select(['guru.*', 'kursus.nama as mengajar_kursus'])
            ->where(['guru.id' => $id])->asArray()
            ->joinWith('kursus')->one();
            return $this->render('guru', [
                'data' => $data,
                'penghargaan' => $penghargaan
            ]);
        }
        else{
            $src_key = isset($_GET['src_key']) ? $_GET['src_key'] : '';
            $allMusik = Guru::getCount(); 
            $filters = Filter::getFilters();

            if ($kat==0) {
                $countAll = $allMusik; 
                $query = Guru::getQuery(['guru.*', 'kursus.nama as mengajar_kursus'], [], 'kursus', $src_key);
            }
            else{
                $countAll = Guru::getCount(['mengajar' => $kat]);   
                $query = Guru::getQuery(['guru.*', 'kursus.nama as mengajar_kursus'], ['mengajar' => $kat], 'kursus', $src_key);
            }
            
            $query = Guru::getOrderedItems($query, $filter);
            $countAm = Guru::find()->select(['guru.*', 'count(guru.id) as jumlahKat',  'kursus.nama as namaKat'])
            ->joinWith('kursus')->asArray()->groupBy('mengajar')->all();
            foreach ($countAm as $key => $value) {
                if ($kat==$value['mengajar']) {
                    $countAm[$key]['isActive'] = true;
                }
                else{
                    $countAm[$key]['isActive'] = false;
    
                }
            }
            $pages = Guru::getForPagination(['mengajar' => $kat], 12);
            $guru = $query->offset($pages->offset)->limit($pages->limit)->all();
            return $this->render('all-guru', [
                'kategori' => $countAm,
                'countAll' => AlatMusik::$count,
                'guru' => $guru,
                'selectedKat' => $kat,
                'allMusik' => $allMusik,
                'pages' => $pages,
                'filters' => $filters,
                'filterSelected' => $filter,
                'query_result' => $this
            ]);

        }
    }
    public function actionDetail($slug, $id)
    {
        $model = new Kursus();
        $guru = Guru::find()
        ->where(['mengajar' => $id])
        ->limit(4)
        ->orderBy('updated_at DESC')->all();
        $data = (object) $model->find()->where(['kursus.id' => $id])->select(['kursus.*', 'kursus_kategori.nama as kat_nama'])->asArray()
        ->joinWith('kursus_kategori')->one();
        $all_kursus = $model->find()->limit(4)->asArray()->all();
        return $this->render('detail', [
            'data' => $data,
            'guru' => $guru,
            'all_kursus' => $all_kursus
        ]);
    }

    public function actionIndex($kat=0, $filter=0)
    {
        $src_key = isset($_GET['src_key']) ? $_GET['src_key'] : '';
        $allMusik = Kursus::getCount(); 
        $filters = Filter::getFilters();
        $guru = Guru::find()
        ->select(['guru.*', 'kursus.nama as mengajar_kursus'])
        ->joinWith('kursus')
        ->limit(4)
        ->orderBy('updated_at DESC')
        ->asArray()->all();
        if ($kat==0) {
            $countAll = $allMusik; 
            $query = Kursus::getQuery(['kursus.*', 'kursus_kategori.nama as kat_nama'], [], 'kursus_kategori', $src_key);
        }
        else{
            $countAll = Kursus::getCount(['kategori' => $kat]);   
            $query = Kursus::getQuery(['kursus.*', 'kursus_kategori.nama as kat_nama'], ['kategori' => $kat], 
            'kursus_kategori', $src_key)   ;    
        }
        
        $query = Kursus::getOrderedItems($query, $filter);
        $countAm = Kursus::find()->select(['kursus.*', 'count(kursus.id) as jumlahKat',  'kursus_kategori.nama as namaKat'])
        ->joinWith('kursus_kategori')->asArray()->groupBy('kategori')->all();
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
            'guru' => $guru,
            'query_result' => $this
        ]);
    }

}
