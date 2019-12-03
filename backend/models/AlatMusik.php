<?php

namespace backend\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use backend\models\AmKategori;

/**
 * This is the model class for table "alat_musik".
 *
 * @property int $id
 * @property string $nama
 * @property int $harga_dasar
 * @property int $is_diskon
 * @property int $harga_final
 * @property string $deskripsi
 * @property string $img
 * @property int $kategori
 * @property string $created_at
 * @property string $updated_at
 */
class AlatMusik extends \backend\models\BaseModel
{
    // public $self = new AlatMusik();
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
    public function getam_kategori()
    {
        return $this->hasMany(AmKategori::className(), ['id' => 'kategori']);
    }
    public static function tableName()
    {
        return 'alat_musik';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama', 'harga_dasar', 'deskripsi'], 'required'],
            [['harga_dasar', 'is_diskon', 'harga_final', 'kategori'], 'integer'],
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
            'harga_dasar' => 'Harga Dasar',
            'is_diskon' => 'Is Diskon',
            'harga_final' => 'Harga Final',
            'deskripsi' => 'Deskripsi',
            'img' => 'Img',
            'kategori' => 'Kategori',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
