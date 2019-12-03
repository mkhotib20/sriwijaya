<?php

namespace backend\models;

use Yii;
use backend\models\AlatMusik;

/**
 * This is the model class for table "warna_musik".
 *
 * @property int $id
 * @property int $wm_am
 * @property string $wm_variasi
 * @property int $stock
 */
class WarnaMusik extends \backend\models\BaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'warna_musik';
    }
    
    public function getAlat_musik()
    {
        return $this->hasMany(AlatMusik::className(), ['id' => 'wm_am']);
    }
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['wm_am', 'wm_variasi', 'stock'], 'required'],
            [['wm_am', 'stock'], 'integer'],
            [['wm_variasi'], 'string', 'max' => 256],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'wm_am' => 'Wm Am',
            'wm_variasi' => 'Wm Variasi',
            'stock' => 'Stock',
        ];
    }
}
