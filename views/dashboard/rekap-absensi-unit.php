<?php

/* @var $this yii\web\View */

use app\components\HelperSso;
use yii\helpers\Html;

$this->title = 'Rekap Absensi';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <div class="card card-body">
        <table border="1" style="width: 100%">
            <tr>
                <th rowspan="2" style="width: 2%; text-align: center; padding:2px">#</th>
                <th rowspan="2" style="width: 13%;text-align: center; padding:10px">NIP</th>
                <th rowspan="2" style="width: 15%;text-align: center;  padding:10px">Nama</th>
                <th rowspan="2" style="width: 15%;text-align: center;  padding:10px">Unit Penempatan</th>
                <th colspan="6" style="text-align: center; width:70%; padding:2px">Rekap Absensi</th>
            </tr>
            <tr>
                <th style="padding:10px;width:10%;text-align: center">Total Hadir</th>
                <th style="padding:10px;width:10%;text-align: center">Total Alfa</th>
                <th style="padding:10px;width:10%;text-align: center">Total Sakit</th>
               
            </tr>
            <?php $i = 0; ?>
            <?php foreach ($absensi as $pg) : ?>
                <tr>
                    <td style="text-align: center; padding:2px"><?= ++$i ?></td>
                    <td style="padding:10px;text-align: center;"><?= $pg['id_nip_nrp'] ?></td>
                    <td style="padding:10px;text-align: center;"><?= $pg['nama_lengkap'] ?></td>
                    <td style="padding:10px;text-align: center;"><?= $pg['namaUnit'] ?></td>
                    <td style="padding:10px;text-align: center;"><?= HelperSso::menghitungTotalHadir($pg['id_nip_nrp']) ?></td>
                    <td style="padding:10px;text-align: center;"><?= HelperSso::menghitungTotalAlfa($pg['id_nip_nrp']) ?></td>
                    <td style="padding:10px;text-align: center;"><?= HelperSso::menghitungTotalIzin($pg['id_nip_nrp']) ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>