<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $searchModel app\modules\rbac\models\searchs\Assignment */
/* @var $usernameField string */
/* @var $extraColumns string[] */

$this->title = Yii::t('rbac-admin', 'Assignments');
$this->params['breadcrumbs'][] = $this->title;

$columns = [
    ['class' => 'yii\grid\SerialColumn'],
    $usernameField,
    'pegawai.employee_name',
    // [
    //     'attribute' => 'nama',
    //     // 'value' => function ($model) {
    //     //     return $model->pegawai->nama_lengkap;
    //     // },
    // ],
];
if (!empty($extraColumns)) {
    $columns = array_merge($columns, $extraColumns);
}
$columns[] = [
    'class' => 'yii\grid\ActionColumn',
    'header' => 'Actions',
    'headerOptions' => ['style' => 'text-align:center'],
    'template' => '{view}'
];
?>
<div class="assignment-index">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">

                <div class="card card-body">
                    <?php Pjax::begin(); ?>
                    <?=
                    GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'columns' => $columns,
                    ]);
                    ?>
                    <?php Pjax::end(); ?>
                </div>

            </div>
        </div>
    </div>
</div>