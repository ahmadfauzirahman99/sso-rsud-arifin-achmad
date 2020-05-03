<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Aplikasi */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="aplikasi-form box box-primary">
    <?php $form = ActiveForm::begin(); ?>
    <div class="card card-body">
        <div class="row">

            <div class="col-lg-4 col-xl-4 col-md-4">
                <?= $form->field($model, 'nma')->textInput(['maxlength' => true, 'placeholder' => 'Nama Aplikasi']) ?>
            </div>
            <div class="col-lg-8 col-xl-8 col-md-8">
                <?= $form->field($model, 'prm')->textInput(['maxlength' => true, 'placeholder' => 'Permision Name']) ?>
            </div>

            <?php // $form->field($model, 'icn')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <?= $form->field($model, 'inf')->textarea(['rows' => 2, 'placeholder' => 'Deskripsi Aplikasi']) ?>

            </div>
            <div class="col-lg-6">
                <?= $form->field($model, 'lnk')->textarea(['rows' => 2, 'placeholder' => 'Link Aplikasi Aplikasi']) ?>
            </div>
        </div>
        <div class="box-footer">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success btn-block btn-flat']) ?>
        </div>
    </div>


    <?php ActiveForm::end(); ?>
</div>
