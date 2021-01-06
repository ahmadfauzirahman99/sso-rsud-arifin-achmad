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
    <?php if (Yii::$app->session->hasFlash('contactFormSubmitted')) : ?>

        <div class="alert alert-success">
            Reset Password Berhasil Dilakukan Oleh <i><?= Yii::$app->user->identity->nama ?></i>
        </div>
    <?php endif; ?>
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
                //                ['class' => 'yii\grid\ActionColumn'],

                'username',
                'nama',
                'role',
                // 'status',
                [
                    'class' => 'app\components\ActionColumn',
                    'header' => 'Actions',
                    'contentOptions' => ['style' => 'color:#337ab7;text-align: center;min-width: 10px;']
                ],
                [
                    'class' => 'yii\grid\ActionColumn',
                    'header' => 'Reset Password',
                    'headerOptions' => ['style' => 'color:#337ab7;text-align: center;min-width: 10px;'],
                    'contentOptions' => ['style' => 'color:#337ab7;text-align: center;min-width: 10px;'],
                    'options' => ['style' => 'width:70px;text-align: center'],
                    'template' => '{reset}',
                    'buttons' => [
                        'reset' => function ($url, $model) {
                            return Html::a('<span class="fa fa-spinner"></span>', $url, [
                                'title' => Yii::t('app', 'Reset Password'),
                                'class' => 'btn btn-info'
                            ]);
                        },


                    ],
                    'urlCreator' => function ($action, $model, $key, $index) {
                        if ($action === 'reset') {
                            $url = \yii\helpers\Url::to(['/user/reset-password', 'id' => $model->userid, 'y' => $model->username]);
                            return $url;
                        }
                    }
                ],
            ],
            'pager' => [
                'class' => 'app\components\GridPager',
            ],
        ]); ?>
    </div>
    <?php Pjax::end(); ?>
</div>