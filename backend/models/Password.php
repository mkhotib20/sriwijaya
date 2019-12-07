<?php

namespace backend\models;

use Yii;
use common\models\User;
/**
 * This is the model class for table "penghargaan".
 *
 * @property int $id
 * @property string $nama
 * @property string $deskripsi
 * @property string $tahun
 * @property int $p_guru
 */
class Password extends \yii\db\ActiveRecord
{
    public $password;
    public $password_confirmation;
    public $_user;

    public function __construct($user_id=null, array $config = [])
    {
        $this->_user = User::findIdentity($user_id);
        parent::__construct($config);
    }
    public function change()
    {
        $user = $this->_user;
        $user->setPassword($this->password);
        return $user->save();
    }
    public function rules()
    {
        return [
            [['password', 'password_confirmation'], 'required'],
            [['password'], 'string', 'min' => 8, 'message' => 'Password minimal 8 karakter'],
            ['password_confirmation', 'compare', 'compareAttribute'=>'password', 'message' => 'Harap ulangi password untuk konfirmasi']
        ];
    }
    public function attributeLabels()
    {
        return [
            'password_confirmation' => 'Ulangi Password',
            'password' => 'Password',
        ];
    }
}
