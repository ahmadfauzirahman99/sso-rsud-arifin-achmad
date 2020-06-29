<?php

/* @var $this yii\web\View */

/* @var $aplikasi \app\models\Aplikasi */

/* @var $pegawai app\models\TbPegawai */

/* @var $log app\models\Sesi */

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
                                    <span class="tx-color-01"><i><?= Yii::$app->user->identity->getRoles() ?></i></span>
                                </p>
                                <p class="mg-b-3 tx-color-02">
                                    <span class="tx-color-01"><b><?= Yii::$app->user->identity->getKodeAkun() ?></b></span>
                                </p>
                            </div>
                            <a href="#" data-value="<?= $pegawai->id_nip_nrp ?>" id="changefoto"
                               class="btn btn-outline-info">Change Foto</a>

                        </div><!-- media -->
                        <hr class="mg-y-25">
                        <h5 class="text-center">Data Profil Diri Saya</h5>
                        <span class="mr-lg-2"></span>
                        <table class="table table-striped table-bordered">
                            <tr>
                                <th>Nama Lengkap</th>
                                <td><?= $pegawai->nama_lengkap ?></td>
                            </tr>
                            <tr>
                                <th>Tanggal Lahir</th>
                                <td><?= $pegawai->tanggal_lahir ?></td>
                            </tr>
                            <tr>
                                <th>Tempat Lahir</th>
                                <td><?= $pegawai->tempat_lahir ?></td>
                            </tr>
                            <tr>
                                <th>Jenis Kelamin</th>
                                <td><?= $pegawai->jenis_kelamin ?></td>
                            </tr>
                            <tr>
                                <th>Status Perkawinan</th>
                                <td><?= $pegawai->status_perkawinan ?></td>
                            </tr>
                            <tr>
                                <th>Tempat Tinggal</th>
                                <td><?= $pegawai->alamat_tempat_tinggal ?></td>
                            </tr>

                        </table>

                        <hr class="ml-lg-2">
                        <h5 class="text-center">Data Pendidikan</h5>
                        <table class="table table-striped table-bordered">
                            <tr>
                                <th>Gelar Sarjana Belakang</th>
                                <td><?= $pegawai->gelar_sarjana_belakang ?></td>
                            </tr>
                            <tr>
                                <th>Gelar Sarjana Depan</th>
                                <td><?= $pegawai->gelar_sarjana_depan ?></td>
                            </tr>
                        </table>
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

                <div class="media d-block d-lg-flex">
                    <div class="media-body mg-t-40 mg-lg-t-0 pd-lg-x-10">
                        <div class="card mg-b-20 mg-lg-b-25">
                            <div class="card-header pd-y-15 pd-x-20 d-flex align-items-center justify-content-between">
                                <h6 class="tx-13 tx-spacing-1 tx-uppercase tx-semibold mg-b-0">History</h6>
                                <nav class="nav nav-icon-only">
                                    <a href="" class="nav-link"><i data-feather="more-horizontal"></i></a>
                                </nav>
                            </div><!-- card-header -->
                            <div class="card-body pd-20 pd-lg-25">
                                <ul class="list-group">
                                    <?php foreach ($log as $item): ?>
                                        <li class="list-group-item d-flex align-items-center">
                                            <img src="<?= Yii::$app->request->baseUrl ?>/img/logo_rsud.jpg"
                                                 class="wd-30 rounded-circle mg-r-15"
                                                 alt="">
                                            <div>
                                                <h4 class="tx-15-f tx-inverse tx-semibold mg-b-0"><?= $item->tgb ?></h4>
                                                <span class="d-block tx-11 text-muted"><?= $item->inf ?> </span>
                                                <span class="d-block tx-11 text-muted"><?= $item->ipa ?> </span>
                                            </div>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div><!-- card -->
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="modal fade" id="modal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content tx-14">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel2">Modal Title</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="">
                    <div class="modal-body">
                        <h5 class="text-center">Comming Soon</h5>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary tx-13" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary tx-13">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php
$JS = <<< JS
  $(document).ready(function() {
    $('#changefoto').on('click',function() {
        $("#exampleModalLabel2").html("<i class='typcn typcn-pencil'></i> &nbsp;Change Foto")
        $("#modal2").modal('show');
    })
  })
JS;
$this->registerJs($JS);
$this->registerJs($this->render('upload.js'));
?>