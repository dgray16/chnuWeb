<?php
/**
 * Created by IntelliJ IDEA.
 * User: Administrator
 * Date: 14.07.2015
 * Time: 13:41
 */
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$form = ActiveForm::begin();
?>
<a href="http://basic/web/index.php?r=user/index/">Modify user table</a>
<h1>Hello, this is test page and you are reading some test text.</h1>

<?php echo "Developer:" . $developer; ?>

<br><br>

<?php
    echo $form->field($model, 'name');
    echo $form->field($model, 'email');
    echo Html::submitButton('Submit', ['class' => 'btn btn-success']);
?>
<br><br>
<?php
    if(Yii::$app->session->hasFlash('success')) echo "<div class='alert alert-success'>" . Yii::$app->session->getFlash('success') . "</div>";
    echo "<b>Name:</b>" . "&nbsp; &nbsp; &nbsp;" . "<b>Email:</b> <br>";
    foreach ($users as $user) {
        echo $user->name . "&nbsp; --- &nbsp;" . $user->email . "<br>";
    }
?>
