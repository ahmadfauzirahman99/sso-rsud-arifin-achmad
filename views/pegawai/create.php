<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TbPegawai */

$this->title = 'Create Tb Pegawai';
$this->params['breadcrumbs'][] = ['label' => 'Tb Pegawais', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tb-pegawai-create">

    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

</div>
