<?php
/* @var $this yii\web\View */
$this->title = 'Hi!';

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \app\models\LoginForm */


$fieldOptions1 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-envelope form-control-feedback'></span>"
];

$fieldOptions2 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-lock form-control-feedback'></span>"
];
?>


<div class="content content-fixed content-auth">
    <div class="container">
        <div class="media align-items-stretch justify-content-center pos-relative">
            <div class="sign-wrapper">

                <div class="card card-body">
                    <h3 class="tx-color-01 mg-b-5" style="text-align: center"><?= $this->title ?> RSUDID</h3>
                    <hr class="mg-y-30">

                    <img src="<?= Yii::$app->request->baseUrl ?>/img/logo_rsud.jpg" width="100px" height="100px" alt="">
                    <hr class="mg-y-30">

                    <p class="tx-color-03 tx-16 mg-b-40">Aplikasi RSUD Arifin Achmad</p>
                    <?php $form = ActiveForm::begin(['id' => 'login-form', 'enableClientValidation' => false]); ?>

                    <?= $form
                        ->field($model, 'username', $fieldOptions1)
                        ->label(false)
                        ->textInput(['placeholder' => 'Nik / Nip']) ?>
                    <?= $form
                        ->field($model, 'password', $fieldOptions2)
                        ->label(false)
                        ->passwordInput(['placeholder' => $model->getAttributeLabel('password')]) ?>
                    <?= Html::submitButton('Sign in', ['class' => 'btn btn-brand-02 btn-block', 'name' => 'login-button']) ?>
                    <?php ActiveForm::end(); ?>

                    <div class="divider-text">or</div>
                    <button class="btn btn-outline-facebook btn-block">Lupa Password</button>
                    <button class="btn btn-outline-twitter btn-block">Reset Password</button>
                </div>
            </div><!-- sign-wrapper -->
        </div><!-- media -->
    </div><!-- container -->
</div><!-- content -->
