<?php

/* @var $this yii\web\View */

/* @var $aplikasi \app\models\Aplikasi */

/* @var $pegawai app\models\TbPegawai */

/* @var $log app\models\Sesi */

use app\models\Absensi;
use yii\base\InvalidValueException;
use yii\helpers\Url;
use yii\web\IdentityInterface;
use \yii\web\User;
use yii\widgets\Pjax;

$this->title = 'Dashboard';
$absen = Absensi::find()->alias('a')
	->where(["a.tanggal_masuk" => date("Y-m-d")])
	->andWhere(['a.nip_nik' => Yii::$app->user->identity->kodeAkun])->one();
	date_default_timezone_set("Asia/Jakarta");

?>
<?php Pjax::begin(['id' => 'pjax-dashboard']); ?>

<div class="row">
	<div class="col-lg-12">
		<h2 id="location"></h2>
		<div class="card mg-b-20 mg-lg-b-25">
			<div class="card-body">
				<?php if (is_null($absen)) { ?>
					<a href="<?= Url::to(['site/absen', 'id' => Yii::$app->user->identity->kodeAkun, 'id_pegawai' => Yii::$app->user->identity->id]) ?>" class="btn btn-outline-primary btn-block">Absen Masuk <b> Pukul :<?= date('H:i:s') ?></b> WIB</a>
				<?php } else { ?>
					<h4 class="text-center">Anda Telah Absen Masuk <b>Pada Pukul <?= $absen->jam_masuk ?> WIB</b></h4>
					<hr>
				<?php } ?>
				<?php if (!is_null($absen)) { ?>
					<?php if (is_null($absen->jam_keluar)) { ?>
						<a href="<?= Url::to(['site/absen', 'id' => Yii::$app->user->identity->kodeAkun, 'id_pegawai' => Yii::$app->user->identity->id]) ?>" class="btn btn-outline-danger btn-block">Absen Pulang <b> Pukul :<?= date('H:i:s') ?></b> WIB</a>
					<?php } else { ?>
						<h4 class="text-center">Anda Telah Absen Keluar <b>Pada Pukul <?= $absen->jam_keluar ?> WIB</b></h4>
					<?php } ?>
				<?php } else { ?>
				<?php } ?>
			</div>
		</div>
	</div>
</div>
<?php Pjax::end(); ?>

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
						<h5 class="mg-b-5"><?= Yii::$app->user->identity->nama ?></h5>
						<p class="mg-b-3 tx-color-02">
							<span class="tx-color-01"><i><?= Yii::$app->user->identity->roles ?></i></span>
						</p>
						<p class="mg-b-3 tx-color-02">
							<span class="tx-color-01"><b><?= Yii::$app->user->identity->kodeAkun ?></b></span>
						</p>
					</div>


				</div><!-- media -->
				<hr class="mg-y-25">

				<did class="row">
					<div class="col-lg-12">
						<a href="#" data-value="<?= $pegawai->id_nip_nrp ?>" id="changefoto" class="btn btn-block btn-outline-info">Change Foto <span class="fa fa-image"></span></a>
					</div>
					<div class="col-lg-12 mg-y-25">
						<a href="#" data-value="<?= $pegawai->id_nip_nrp ?>" id="changepassword" class="btn btn-block btn-outline-warning">Change Password <span class="fa fa-lock"></span></a>
					</div>
				</did>
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
					<?= $this->render(
						'_aplikasi.php',
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
							<?php foreach ($log as $item) : ?>
								<li class="list-group-item d-flex align-items-center">
									<img src="<?= Yii::$app->request->baseUrl ?>/img/logo_rsud.jpg" class="wd-30 rounded-circle mg-r-15" alt="">
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

<div class="modal fade" id="modal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
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

<div class="modal fade" id="modalPassword" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content tx-14">
			<div class="modal-header">
				<h6 class="modal-title" id="changepasswordTitle">Modal Title</h6>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form name="ubahpassword" id="ubahpassword">
				<div class="modal-body">
					<div class="input-group mg-b-10">
						<div class="input-group-prepend">
							<span class="input-group-text" id="basic-addon1"><span class="fa fa-lock"></span></span>
						</div>
						<input type="password" class="form-control" name="passwordBaru" id="passwordBaru" placeholder="Password Baru" aria-label="Password Baru" aria-describedby="PasswordBaru">
					</div>
					<div class="input-group mg-b-10">
						<div class="input-group-prepend">
							<span class="input-group-text" id="basic-addon1"><span class="fa fa-lock"></span></span>
						</div>
						<input type="password" class="form-control" name="konfirmasiPasswordBaru" id="konfirmasiPasswordBaru" placeholder="Konfirmasi Password Baru" aria-label="Konfirmasi" aria-describedby="KonfirmasiPasswordBaru">
					</div>
					<div class="custom-control custom-switch">
						<input type="checkbox" class="custom-control-input" id="customSwitch1">
						<label class="custom-control-label" for="customSwitch1">Show Password</label>
					</div>
					<input type="hidden" name="<?= Yii::$app->request->csrfParam ?>" value="<?= Yii::$app->request->csrfToken ?>">
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary tx-13" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary tx-13">Save</button>
				</div>
			</form>
		</div>
	</div>


	<?php
	$JS = <<< JS
  $(document).ready(function() {


    setInterval(function () {
        $.pjax.reload({
            container: '#pjax-dashboard',
            timeout: false
        });
    }, 3000);
      // change foto
    $('#changefoto').on('click',function() {
        $("#exampleModalLabel2").html("<i class='typcn typcn-pencil'></i> &nbsp;Change Foto")
        $("#modal2").modal('show');
    });
    
    
    // change password
    $("#changepassword").on('click',function() {
        $("#changepasswordTitle").html("<i class='typcn typcn-pencil'></i> &nbsp;Change Password")
        $("#modalPassword").modal('show');
    })
    
    $("#cetak").on('click',function() {
        var data = {
          nip : 1123213,
          tanggal : $("#date").val(),
          rumpun : '12'  
        };
     	alert($("#date").val());
    
    })
   
   $("#ubahpassword").on("submit", function (e) {
        e.preventDefault();
        onSavePassword(this, e);
   });
    
    $("#customSwitch1").on('click',function() {
     var x = document.getElementById("passwordBaru");
     var y = document.getElementById("konfirmasiPasswordBaru");
      if (x.type === "password" || y.type === "password") {
        x.type = "text";
        y.type = "text";
      } else {
        x.type = "password";
        y.type = "password";
      }
   })
   
  })
  
  function onSavePassword() {
    var data = $("#ubahpassword").serialize();
    console.log(data)
    $.post("api-sso/change-password", data, function (response) {
        console.log(response);
        if (response.con) {
            showNotification(true, response.msg);
           console.log(response.con) 
            $("#modalPassword").modal("hide");
            
              setTimeout(function(){ 
                location.reload();
              }, 3000);

        } else {
            showNotification(false, response.msg);
            console.log(response.con)
             $("#modalPassword").modal("hide");
            
        }
    }, 'JSON')
    function showNotification(con, msg, icon) {
        $.notify({
            icon: (icon === undefined) ? (con ? "pe-7s-loop" : "pe-7s-attention") : icon,
            message: (con == true ? "<b>Berhasil...</b>" : "<b>Oops...</b>") + "<br/>" + msg
        }, {
            type: (con == true ? "success" : "warning"),
            timer: 3000
        });
    }
    
 

}


JS;
	$this->registerJs($JS);
	$this->registerJs($this->render('upload.js'));
	?>