<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "penghargaan".
 *
 * @property int $id
 * @property string $nama
 * @property string $deskripsi
 * @property string $tahun
 * @property int $p_guru
 */
class Penghargaan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'penghargaan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama', 'p_guru'], 'required'],
            [['deskripsi'], 'string'],
            [['p_guru'], 'integer'],
            [['nama'], 'string', 'max' => 256],
            [['tahun'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama' => 'Nama',
            'deskripsi' => 'Deskripsi',
            'tahun' => 'Tahun',
            'p_guru' => 'P Guru',
        ];
    }
}
