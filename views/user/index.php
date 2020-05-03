<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AkunAknUserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Akun Identitas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="akun-akn-user-index box box-primary">
    <?php Pjax::begin(); ?>
    <h1 class="df-title">Form Tambah User</h1>
    <hr class="mg-y-30">
    <div class="card card-body">
        <?php echo $this->render('_search', ['model' => $searchModel]); ?>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'layout' => "{items}\n{summary}\n{pager}",
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

//                'userid',
//                'id_pegawai',
                'username',
//                'password',
                'nama',
//                 'tanggal_pendaftaran',
                 'role',
                // 'token_aktivasi:ntext',
                // 'status',

                [
                    'class' => 'app\components\ActionColumn',
                ],
            ],
            'pager' => [
                'class' => 'app\components\GridPager',
            ],
        ]); ?>
    </div>
    <?php Pjax::end(); ?>
</div>
