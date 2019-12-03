<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "sejarah".
 *
 * @property int $id
 * @property string $judul
 * @property string $deskripsi
 * @property string $img
 * @property string $tanggal
 */
class Sejarah extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sejarah';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['judul', 'deskripsi', 'img', 'tanggal'], 'required'],
            [['deskripsi'], 'string'],
            [['tanggal'], 'safe'],
            [['judul', 'img'], 'string', 'max' => 256],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'judul' => 'Judul',
            'deskripsi' => 'Deskripsi',
            'img' => 'Img',
            'tanggal' => 'Tanggal',
        ];
    }
}
