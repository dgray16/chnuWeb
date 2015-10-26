<?php
/**
 * Created by IntelliJ IDEA.
 * User: Administrator
 * Date: 14.07.2015
 * Time: 13:54
 */
namespace app\models;
use yii\base\Model;

class TestForm extends Model{
    public $name;
    public $email;

    public function rules(){
        return [
            [['name', 'email'], 'required'],
            ['email', 'email'],
        ];
    }
}