<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AplikasiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Aplikasi';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="card card-body">
    <?php Pjax::begin(); ?>
    <div class="box-body ">
        <?php echo $this->render('_search', ['model' => $searchModel]); ?>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
//            'filterModel' => $searchModel,
//            'tableOptions' => 'no-warp',

            'layout' => "{items}\n{summary}\n{pager}",
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

//                'id',
                'nma',
//                'inf:ntext',
//                'prm',
//                'icn',
                'lnk',
                // 'kda',
                // 'sta:boolean',
                // 'crd',
                // 'mdd',

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
