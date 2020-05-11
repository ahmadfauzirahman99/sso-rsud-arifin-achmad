<?php

/* @var $this yii\web\View */

/* @var $aplikasi \app\models\Aplikasi */

use yii\base\InvalidValueException;
use yii\web\IdentityInterface;
use \yii\web\User;

$this->title = 'Dashboard';
?>
    <div class="container pd-x-0 tx-13">
        <div class="row">
            <div class="col-lg-5">
                <div class="card mg-b-20 mg-lg-b-25">
                    <div class="card-header pd-y-15 pd-x-20 d-flex align-items-center justify-content-between">
                        <h6 class="tx-uppercase tx-semibold mg-b-0">Saya</h6>
                    </div><!-- card-header -->
                    <div class="card-body pd-25">
                        <div class="media d-block d-sm-flex">
                            <div class="wd-80 ht-80 bg-ui-04 rounded d-flex align-items-center justify-content-center">
                                <img src="<?= Yii::$app->request->baseUrl ?>/img/user1_128.png" alt="">
                            </div>
                            <div class="media-body pd-t-25 pd-sm-t-0 pd-sm-l-25">
                                <h5 class="mg-b-5"><?= Yii::$app->user->identity->getNama() ?></h5>
                                <p class="mg-b-3 tx-color-02">
                                    <span class="tx-color-01"><?= Yii::$app->user->identity->getRoles() ?></span>
                                </p>
                            </div>
                        </div><!-- media -->
                        <hr class="mg-y-40">
                        <ul class="list-group">
                            <li class="list-group-item">Data Pegawai <span class="badge badge-primary"><i class="fa fa-users"></i></span></li>
                            <li class="list-group-item">Data Pendidikan <span class="badge badge-primary"><i class="fa fa-list"></i></span></li>
                            <li class="list-group-item">Data Saya <span class="badge badge-primary"><i class="fa fa-user"></i></span></li>
                        </ul>
                    </div>

                </div>
            </div>
            <div class="col-lg-7">
                <div class="media d-block d-lg-flex">
                    <div class="media-body mg-t-40 mg-lg-t-0 pd-lg-x-10">
                        <div class="card mg-b-20 mg-lg-b-25">
                            <?= $this->render('_aplikasi.php',
                                [
                                    'aplikasi' => $aplikasi
                                ]
                            ) ?>
                        </div><!-- card -->
                    </div>
                </div>
            </div>

        </div>
    </div>
<?php
$JS = <<< JS

JS;
$this->registerJs($JS);
?>