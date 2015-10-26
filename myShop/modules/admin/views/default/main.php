<?php
/**
 * Created by IntelliJ IDEA.
 * User: Administrator
 * Date: 21.10.2015
 * Time: 20:50
 */

use \yii\helpers\Html;

$this->title = 'Main';
$this->params['breadcrumbs'][] = $this->title;
?>
<div>
    <h2>Select section:</h2>
    <p>
        <?= Html::a('Categories', ['category'], ['class' => 'btn btn-success bigger-size']) ?>
    </p>

    <p>
        <?= Html::a('Products', ['product'], ['class' => 'btn btn-success bigger-size']) ?>
    </p>
</div>
