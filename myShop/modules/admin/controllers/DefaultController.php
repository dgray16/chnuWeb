<?php

namespace app\modules\admin\controllers;

use Yii;
use app\modules\admin\models\AdminLoginForm;
use yii\web\Controller;

class DefaultController extends Controller
{
    public $layout = 'admin';

    public function actionIndex()
    {
        $model = new AdminLoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->redirect('/admin/default/main');
        } else {
            return $this->render('index', [
                'model' => $model,
            ]);
        }
    }

    public function actionMain()
    {
        return $this->render('main');
    }

    public function actionCategory(){
        return $this->redirect('/admin/category');
    }

    public function actionProduct(){
        return $this->redirect('/admin/product');
    }
}
