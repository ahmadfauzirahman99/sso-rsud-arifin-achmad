<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TbPegawai */

$this->title = 'Update Tb Pegawai: ' . $model->nip;
$this->params['breadcrumbs'][] = ['label' => 'Tb Pegawais', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nip, 'url' => ['view', 'id' => $model->nip]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tb-pegawai-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
