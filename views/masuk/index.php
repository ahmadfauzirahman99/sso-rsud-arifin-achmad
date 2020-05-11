<?php
/* @var $this yii\web\View */
$this->title = 'Hi! Selamat Datang';

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \app\models\LoginForm */

?>
    <style>
        .website-logo .logo {
            background-image: url("<?= Yii::$app->request->baseUrl ?>/img/logo_rsud.png");
        }

        .img-holder {
            width: 550px;
            background: linear-gradient(to bottom, #99ff99 0%, #ff99cc 100%) !important;
        }

    </style>
    <div class="form-body" class="container-fluid" style="font-family: 'Roboto', sans-serif !important;">
        <div class="row">
            <div class="img-holder">
                <div class="bg"></div>
                <div class="info-holder">

                    <img src="<?= Yii::$app->request->baseUrl ?>/img/banner-1.png" alt="">
                </div>
            </div>
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <img src="<?= Yii::$app->request->baseUrl ?>/img/logo_rsud.png" height="100px" alt="">
                        <img src="<?= Yii::$app->request->baseUrl ?>/img/logo_riau.png" height="100px" alt=""> &nbsp;&nbsp;
                        <img src="<?= Yii::$app->request->baseUrl ?>/img/logo_kars.png" height="100px" alt="">
                        <hr>
                        <h3>Sistem Informasi Manajemen Rumah Sakit</h3>
                        <p><?= \app\widgets\Alert::widget() ?>
                        </p>

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