<?php
/**
 * Created by IntelliJ IDEA.
 * User: Administrator
 * Date: 24.09.2015
 * Time: 10:10
 */

namespace app\modules\admin\models;

use Yii;
use yii\helpers\Security;
use yii\web\IdentityInterface;

/**
 * Class AdminUser
 * @package app\modules\admin\models
 *
 * This is model class for table "admin_user"
 *
 * @property string login
 * @property string password
 * @property string email
 */

class AdminUser extends \yii\db\ActiveRecord implements IdentityInterface
{

    public static function tableName(){
        return 'admin_user';
    }

    public function rules(){
        return [
            [['username', 'password'], 'required'],
            [['username', 'password'], 'string', 'max' => 100]
        ];
    }

    public function attributeLabels(){
        return [
            'username' => 'Username',
            'password' => 'Password',
            'email' => 'Email',
            'id' => 'ID'
        ];
    }

    public static function findIdentity($id)
    {
        return static::findOne($id);
    }
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }

    public static function findByPasswordResetToken($token){
        $expire = \Yii::$app->params['AdminUser.passwordResetTokenExpire'];
        $parts = explode('_', $token);
        $timestamp = (int) end($parts);
        if ($timestamp + $expire < time()) return null;
        return static::findOne(['password_reset_token' => $token]);
    }
    public function validatePassword($password){
        return $this->password === sha1($password);
    }
    public function setPassword($password){
        $this->password_hash = Security::generatePasswordHash($password);
    }
    public function generatePasswordResetToken(){
        $this->password_reset_token = Security::generateRandomKey() . '_' . time();
    }
    public function removePasswordResetToken(){
        $this->password_reset_token = null;
    }

    public function getId()
    {
        return $this->getPrimaryKey();
    }

    public function getAuthKey()
    {
        return $this->auth_key;
    }
    public function generateAuthKey(){
        $this->auth_key = Security::generateRandomKey();
    }
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    public static function findByUsername($username){
        return static::findOne(['username' => $username]);
    }




}