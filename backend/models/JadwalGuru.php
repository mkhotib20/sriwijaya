<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "jadwal_guru".
 *
 * @property int $id
 * @property int $guru
 * @property int $jam
 * @property int $day
 * @property int $isAvailable
 *
 * @property Jam $jam0
 * @property Days $day0
 * @property Guru $guru0
 */
class JadwalGuru extends \backend\models\BaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'jadwal_guru';
    }

    /**
     * {@inheritdoc}
     */
    public static function joined($id, $day=null)
    {
        if ($day!=null) {
            return self::find()
            ->joinWith(['jam', 'days'])
            ->select(['jadwal_guru.*', 'jam.jam as namaJam', 'days.name as namaHari'])
            ->where(['guru' => $id, 'day' => $day])->asArray()->all();
        }
        return self::find()
        ->joinWith(['jam', 'days'])
        ->select(['jadwal_guru.*', 'jam.jam as namaJam', 'days.name as namaHari'])
        ->where(['guru' => $id])->asArray()->all();
    }
    public function rules()
    {
        return [
            [['guru', 'jam', 'day', 'isAvailable'], 'required'],
            [['guru', 'jam', 'day', 'isAvailable'], 'integer'],
            [['jam'], 'exist', 'skipOnError' => true, 'targetClass' => Jam::className(), 'targetAttribute' => ['jam' => 'id']],
            [['day'], 'exist', 'skipOnError' => true, 'targetClass' => Days::className(), 'targetAttribute' => ['day' => 'id']],
            [['guru'], 'exist', 'skipOnError' => true, 'targetClass' => Guru::className(), 'targetAttribute' => ['guru' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'guru' => 'Guru',
            'jam' => 'Jam',
            'day' => 'Day',
            'isAvailable' => 'Is Available',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJam()
    {
        return $this->hasOne(Jam::className(), ['id' => 'jam']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDays()
    {
        return $this->hasOne(Days::className(), ['id' => 'day']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGuru()
    {
        return $this->hasOne(Guru::className(), ['id' => 'guru']);
    }
}
