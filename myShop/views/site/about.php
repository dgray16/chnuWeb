<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::img('@web/images/logo.png'); ?>
        <br>
        Ray Ban corp founded in 2015. We are located in Chernivtsi, Ukraine.
        <br>
    </p>
</div>
