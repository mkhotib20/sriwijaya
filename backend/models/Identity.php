<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "identity".
 *
 * @property int $id
 * @property string $iden_name
 * @property string $iden_content
 * @property string $iden_key
 * @property string $created_at
 * @property string $updated_at
 */
class Identity extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'identity';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['iden_name', 'iden_content', 'iden_key'], 'required'],
            [['iden_content'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['iden_name'], 'string', 'max' => 256],
            [['iden_key'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'iden_name' => 'Iden Name',
            'iden_content' => 'Iden Content',
            'iden_key' => 'Iden Key',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
