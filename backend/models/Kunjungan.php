<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "kunjungan".
 *
 * @property int $id
 * @property string $ip
 * @property string $time
 * @property int $quarter
 * @property string $produk
 */
class Kunjungan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kunjungan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ip', 'quarter', 'produk'], 'required'],
            [['time'], 'safe'],
            [['quarter'], 'integer'],
            [['ip'], 'string', 'max' => 50],
            [['produk'], 'string', 'max' => 256],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ip' => 'Ip',
            'time' => 'Time',
            'quarter' => 'Quarter',
            'produk' => 'Produk',
        ];
    }
}
