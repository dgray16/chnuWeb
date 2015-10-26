<?php
namespace app\components;

/**
 * Created by IntelliJ IDEA.
 * User: Administrator
 * Date: 08.10.2015
 * Time: 10:24
 */
class Request extends \yii\web\Request
{
    // TODO delete this class
    public $web;
    public $adminUrl;

    public function getBaseUrl()
    {
        return str_replace($this->web, "", parent::getBaseUrl()) . $this->adminUrl;
    }

    public function resolvePathInfo()
    {
        if ( $this->getUrl() === $this->adminUrl ) return "";
        else return parent::resolvePathInfo();

    }


}