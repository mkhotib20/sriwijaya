<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "days".
 *
 * @property int $id
 * @property string $name
 *
 * @property JadwalGuru[] $jadwalGurus
 */
class Days extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'days';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 100],
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJadwalGurus()
    {
        return $this->hasMany(JadwalGuru::className(), ['day' => 'id']);
    }
}
