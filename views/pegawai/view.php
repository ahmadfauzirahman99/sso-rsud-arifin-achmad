<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\TbPegawai */

$this->title = $model->nip;
$this->params['breadcrumbs'][] = ['label' => 'Tb Pegawais', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tb-pegawai-view box box-primary">
    <div class="box-header">
        <?= Html::a('Update', ['update', 'id' => $model->nip], ['class' => 'btn btn-primary btn-flat']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->nip], [
            'class' => 'btn btn-danger btn-flat',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </div>
    <div class="box-body table-responsive no-padding">
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'pegawai_id',
                'nip',
                'nama_lengkap',
                'gelar_sarjana_depan',
                'gelar_sarjana_belakang',
                'pendidikan_terakhir_id',
                'tempat_lahir',
                'tanggal_lahir',
                'jenis_kelamin',
                'nomor_karpeg',
                'nomor_kartu_askes',
                'nomor_karis_karsu',
                'npwp',
                'nomor_ktp',
                'nota_persetujuan_bkn_nomor_cpns',
                'nota_persetujuan_bkn_tanggal_cpns',
                'pejabat_yang_menetapkan_cpns',
                'sk_cpns_nomor_cpns',
                'sk_cpns_tanggal_cpns',
                'kode_pangkat_cpns',
                'tmt_cpns',
                'masa_kerja_tahun_cpns',
                'masa_kerja_bulan_cpns',
                'pejabat_yang_menetapkan_pns',
                'sk_nomor_pns',
                'sk_tanggal_pns',
                'kode_pangkat_pns',
                'tmt_pns',
                'sumpah_janji_pns',
                'masa_kerja_tahun_pns',
                'masa_kerja_bulan_pns',
                'status_perkawinan',
                'tinggi_keterangan_badan',
                'berat_badan_keterangan_badan',
                'rambut_keterangan_badan',
                'bentuk_muka_keterangan_badan',
                'warna_kulit_keterangan_badan',
                'ciri_ciri_khas_keterangan_badan',
                'cacat_tubuh_keterangan_badan',
                'kegemaran_1',
                'kegemaran_2',
                'kegemaran_3',
                'status_aktif_pegawai',
                'kode_kategori_pegawai',
                'pangkat_terakhir_id',
                'agama',
                'alamat_tempat_tinggal',
                'rt_tempat_tinggal',
                'rw_tempat_tinggal',
                'desa_kelurahan',
                'kecamatan',
                'kabupaten_kota',
                'provinsi',
                'kode_pos',
                'no_telepon_1',
                'no_telepon_2',
                'golongan_darah',
                'status_kepegawaian_id',
                'jenis_kepegawaian_id',
                'jenis_jabatan',
                'kode_jabatan',
                'kode_bagian',
                'fungsional_struktural',
                'tmt_jabatan',
            ],
        ]) ?>
    </div>
</div>
