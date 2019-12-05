<?php
namespace backend\components;
use Yii;
use backend\models\AmKategori;
use backend\models\KursusKategori;
use backend\models\Kursus;
class DropdownHelpers 
{
    public function getDropdown($model)
    {
        $ak = $model->find()->asArray()->all();
        foreach ($ak as $key => $value) {
            $arr[$value['id']] = $value['name'];
        }
        return $arr;
    }public function getJam($model)
    {
        $ak = $model->find()->asArray()->all();
        foreach ($ak as $key => $value) {
            $arr[$value['id']] = $value['jam'];
        }
        return $arr;
    }
    public static function getKategori()
    {
        $ak = AmKategori::find()->asArray()->all();
        foreach ($ak as $key => $value) {
            $arr[$value['id']] = $value['name'];
        }
        return $arr;
    }
    public static function getKursusKat()
    {
        $ak = KursusKategori::find()->asArray()->all();
        foreach ($ak as $key => $value) {
            $arr[$value['id']] = $value['nama'];
        }
        return $arr;
    }
    public static function getKursus()
    {
        $ak = Kursus::find()->asArray()->all();
        foreach ($ak as $key => $value) {
            $arr[$value['id']] = $value['nama'];
        }
        return $arr;
    }
}
