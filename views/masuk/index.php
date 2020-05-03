<?php
/* @var $this yii\web\View */
$this->title = 'Hi!';

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \app\models\LoginForm */

?>
    <div class="form-body" class="container-fluid" style="font-family: 'Roboto', sans-serif !important;">
        <div class="website-logo">
            <a href="index.html">
                <div class="logo">
                    <img class="logo-size" src="<?= Yii::$app->request->baseUrl ?>/login-theme/images/logo-light.svg"
                         alt="">
                </div>
            </a>
        </div>
        <div class="row">
            <div class="img-holder">
                <div class="bg"></div>
                <div class="info-holder">
                    <img src="<?= Yii::$app->request->baseUrl ?>/login-theme/images/graphic1.svg" alt="">
                </div>
            </div>
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <h3>Aplikasi E-Medical</h3>
                        <p>Access to the most powerfull tool in the entire design and web industry.</p>
                        <div class="page-links">
                            <a href="" class="active">RSUD ARIFIN ACHMAD</a>
                        </div>
                        <form method="post" action="#">
                            <input class="form-control" type="text" name="Masuk[]" placeholder="NIK / NIP / Email"
                                   >
                            <input class="form-control" type="password" name="Masuk[]" placeholder="Password">

                            <div class="form-button">
                                <input type="hidden" name="<?= Yii::$app->request->csrfParam ?>"
                                       value="<?= Yii::$app->request->csrfToken ?>">
                                <button id="submit" type="submit" class="ibtn">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
$JS = <<< JS
$(document).ready(function() {
    // console.log("sadsadas")
})
JS;
$this->registerJs($JS);
?>