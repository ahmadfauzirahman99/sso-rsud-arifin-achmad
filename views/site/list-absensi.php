<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'List Absensi';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <div class="row">
        <div class="col-lg-12">
            <h2 class="text-center">Laporan Absensi Bulan Ini</h2>

            <table border="1" style="width: 100%">
                <tr>
                    <th rowspan="2" style="width: 2%; text-align: center; padding:2px">#</th>
                    <th rowspan="2" style="width: 13%; text-align: center; padding:2px">NIP</th>
                    <th rowspan="2" style="width: 15%; text-align: center; padding:2px">Nama</th>
                    <th colspan="31" style="text-align: center; width:70%; padding:2px">Tanggal</th>
                </tr>
                <tr>
                    <?php
                    $d = cal_days_in_month(CAL_GREGORIAN, date('m'), date('Y'));

                    for ($i = 1; $i <= $d; $i++) { ?>
                        <th style="width:  2%; text-align: center; padding:2px"><?= $i ?></th>
                    <?php } ?>
                </tr>
                <?php $i = 0; ?>
                <tr>
                    <td style="text-align: center; padding:2px"><?= ++$i ?></td>
                    <td style="text-align: center; padding:2px"><?= Yii::$app->user->identity->kodeAkun ?></td>
                    <td style="text-align: center; padding:2px"><?= Yii::$app->user->identity->nama ?></td>
                    <?php foreach ($absensis as $item) { ?>
                        <?php foreach ($item['absensi'] as $dt_absen) : ?>
                            <th style="width:  2%; text-align: center; padding:2px"><?= $dt_absen['kehadiran'] ?></th>
                        <?php endforeach; ?>
                    <?php } ?>
                </tr>
            </table>
            <br>
            <div class="col-lg-12">
                <span class="badge badge-success">H : Hadir</span>
                <span class="badge badge-info">A : ALFA</span>
                <span class="badge badge-danger">LN/L : Hari Libur Nasional atau Libur Kerja</span>
            </div>
        </div>

    </div>
    <br>
</div>