<?php

namespace backend\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * This is the model class for table "kursus".
 *
 * @property int $id
 * @property string $nama
 * @property int $tarif
 * @property string $deskripsi
 * @property string $img
 * @property int $kategori
 * @property string $created_at
 * @property string $updated_at
 *
 * @property KursusKategori $kategori0
 */
class Kursus extends \backend\models\BaseModel
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at',
                'value' => new Expression('NOW()'),
            ],
        ];
    }
    public static function tableName()
    {
        return 'kursus';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama', 'tarif'], 'required'],
            [['tarif', 'kategori'], 'integer'],
            [['deskripsi'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['nama', 'img'], 'string', 'max' => 256],
            [['kategori'], 'exist', 'skipOnError' => true, 'targetClass' => KursusKategori::className(), 'targetAttribute' => ['kategori' => 'id']],
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
            'tarif' => 'Tarif',
            'deskripsi' => 'Deskripsi',
            'img' => 'Img',
            'kategori' => 'Kategori',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKursus_kategori()
    {
        return $this->hasOne(KursusKategori::className(), ['id' => 'kategori']);
    }
}
