<?php

/* @var $this yii\web\View */
/* @var $aplikasi \app\models\Aplikasi */

$this->title = 'Dashboard';
?>
<div class="container pd-x-0 tx-13">
    <div class="row">
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
