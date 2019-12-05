<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "feedback".
 *
 * @property int $id
 * @property string $from_email
 * @property string $from_name
 * @property string $content
 * @property string $created_at
 */
class Feedback extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'feedback';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['from_email', 'from_name', 'content'], 'required'],
            [['content'], 'string'],
            [['created_at'], 'safe'],
            [['from_email', 'from_name'], 'string', 'max' => 256],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'from_email' => 'From Email',
            'from_name' => 'From Name',
            'content' => 'Content',
            'created_at' => 'Created At',
        ];
    }
}
