<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "jam".
 *
 * @property int $id
 * @property string $jam
 *
 * @property JadwalGuru[] $jadwalGurus
 */
class Jam extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'jam';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['jam'], 'required'],
            [['jam'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'jam' => 'Jam',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJadwalGurus()
    {
        return $this->hasMany(JadwalGuru::className(), ['jam' => 'id']);
    }
}
