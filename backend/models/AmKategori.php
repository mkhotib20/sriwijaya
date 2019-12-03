<?php

namespace backend\models;

use Yii;
use backend\models\AlatMusik; 

/**
 * This is the model class for table "am_kategori".
 *
 * @property int $id
 * @property string $name
 * @property string $icon
 */
class AmKategori extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public function getAlatMusik() 
    { 
        return $this->hasMany(AlatMusik::className(), ['id' => 'kategori']); 
    } 
    public static function tableName()
    {
        return 'am_kategori';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 256],
            [['icon'], 'string', 'max' => 30],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'icon' => 'Icon',
        ];
    }
}
