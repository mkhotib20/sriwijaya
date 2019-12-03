<?php
namespace backend\models;

use yii\data\Pagination;

class BaseModel extends \yii\db\ActiveRecord
{
    public $self;
    public $join;
    public static $count;
    public static function getCount($where=[])
    {
        $data = self::find()->select(['count(id)'])->where($where)->asArray()->one();
        return $data['count(id)'];
    }
    public static function getAll($select=[],$where=[], $join='')
    {
        return self::find()->select($select)->joinWith($join)->where($where)->asArray()->all();
    }
    public static function getQuery($select=[],$where=[], $join='', $key='')
    {
        $data = self::find();
        self::$count = $data->select(['count(id)'])->where($where)->andWhere(['like', self::tableName().'.nama', $key])->asArray()->one()['count(id)'];
        return $data->select($select)->joinWith($join)->where($where)->andWhere(['like', self::tableName().'.nama', $key]);
    }
    public static function getSingle($select=['*'],$where=[], $join='')
    {
        return self::find()->select($select)->joinWith($join)->where($where)->asArray()->one();
    }
    public static function getForPagination($kat,$size)
    {
        $count = self::getCount($kat) != 0 ? self::getCount($kat) : self::getCount();
        $pages = new Pagination(['totalCount' => $count]);
        $pages->pageSize = $size;
        return $pages;
    }
    public function getSearchData($data, $key)
    {
        $arr = $data->andWhere(['like', 'nama', $key]);
        return ;
    }
    public function getOrderedItems($query, $orderType)
    {
        $harga = (self::tableName() == '{{%kursus}}') ? 'tarif' : 'harga_final'; 
        switch ($orderType) {
            case 0:
                $data = $query->orderBy(self::tableName().'.updated_at DESC');
                break;
            case 1:
                $data = $query->orderBy(self::tableName().'.'.$harga.' ASC');
                break;
            case 2:
                $data = $query->orderBy(self::tableName().'.'.$harga.' DESC');
                break;
            default:
                # code...
                break;
        }
        return $data;
    }
}
