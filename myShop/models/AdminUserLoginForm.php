<?php
/**
 * Created by IntelliJ IDEA.
 * User: Administrator
 * Date: 24.09.2015
 * Time: 10:06
 */

namespace app\models;


use Yii;
use yii\base\Model;

class AdminUserLoginForm extends Model
{
    public $username;
    public $password;
    public $rememberMe = true;

    private $_user = false;

    public function rules()
{
    return [
        // login and password are both required
        [['username', 'password'], 'required'],
        // rememberMe must be a boolean value
        ['rememberMe', 'boolean'],
        // password is validated by validatePassword()
        ['password', 'validatePassword'],
    ];
}

    public function validatePassword($attribute, $params)
{
    if (!$this->hasErrors()) {
        $user = $this->getUser();

        if (!$user || !$user->validatePassword($this->password)) {
            $this->addError($attribute, 'Incorrect login or password.');
        }
    }
}

    public function login(){
    if ($this->validate()) {
        return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600*24*30 : 0);
    } else {
        return false;
    }
}

    public function getUser()
{
    if ($this->_user === false) {
        $this->_user = AdminUser::findByUsername($this->username);
    }

    return $this->_user;
}

}