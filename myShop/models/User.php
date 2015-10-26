<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "customer"
 *
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string $telephone
 * @property string $login
 * @property string $password
 * @property string $address
 * @property boolean $activity
 */
class User extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'customer';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['login', 'password', 'email', 'first_name', 'last_name'], 'required'],
            [['first_name'], 'string', 'max' => 50],
            [['last_name'], 'string', 'max' => 50],
            [['email'], 'string', 'max' => 40],
            [['telephone'], 'string', 'max' => 40],
            [['login'], 'string', 'max' => 50],
            [['password'], 'string', 'max' => 50],
            [['address'], 'string', 'max' => 50],
            [['activity'], 'boolean']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'first_name' => 'First name',
            'last_name' => 'Last name',
            'email' => 'Email',
            'telephone' => 'Telephone',
            'login' => 'Login',
            'password' => 'Password',
            'address' => 'Address',
            'activity' => 'Activity',
        ];
    }

    // hash password
    public function hashPassword($password, $salt)
    {
        return md5($salt.$password);
    }

// password validation
    public function validatePassword($password)
    {
        return $this->hashPassword($password,$this->salt)===$this->password;
    }

//generate salt
    public function generateSalt()
    {
        return uniqid('',true);
    }

    public function beforeValidate()
    {
        $this->salt = $this->generateSalt();
        return parent::beforeValidate();
    }

    public function beforeSave()
    {
        $this->password = $this->hashPassword($this->password, $this->salt);
        return parent::beforeSave();
    }
}
