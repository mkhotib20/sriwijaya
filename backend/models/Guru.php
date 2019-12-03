<?php

namespace backend\models;

use Yii;
use backend\models\Kursus;
/**
 * This is the model class for table "guru".
 *
 * @property int $id
 * @property string $nama
 * @property int $usia
 * @property int $mengajar
 * @property string $deskripsi
 * @property string $img
 * @property string $created_at
 * @property string $updated_at
 */
class Guru extends \backend\models\BaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'guru';
    }

    public function getKursus()
    {
        return $this->hasMany(Kursus::className(), ['id' => 'mengajar']);
    }
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama', 'usia', 'deskripsi'], 'required'],
            [['usia', 'mengajar'], 'integer'],
            [['deskripsi'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['nama', 'img'], 'string', 'max' => 256],
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
            'usia' => 'Usia',
            'mengajar' => 'Mengajar',
            'deskripsi' => 'Deskripsi',
            'img' => 'Img',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
