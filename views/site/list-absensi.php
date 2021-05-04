<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use app\components\HelperSso;
use app\models\Absensi;

$this->title = 'List Absensi';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <div class="row">
        <div class="col-lg-4">
            <form method="post" action="#">
                <input type="hidden" name="<?= Yii::$app->request->csrfParam ?>" value="<?= Yii::$app->request->csrfToken ?>">
                <h4>Pilih Bulan</h4>
                <select name="bulan" id="" class="form-control">
                    <option value="">Pilih Bulan</option>
                    <?php for ($s = 1; $s <= 12; $s++) { ?>
                        <option value="<?= $s ?>"><?= $s ?></option>
                    <?php } ?>
                </select>
                <br>
                <button id="submit" type="submit" class="btn btn-primary">Cari Rekap Absen</button>

                <br>
            </form>

        </div>
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
        </div>
        <div class="col-lg-12">
            <span class="badge badge-success">H : Hadir</span>
            <span class="badge badge-info">A : ALFA</span>
            <span class="badge badge-danger">LN/L : Hari Libur Nasional atau Libur Kerja</span>
        </div>
    </div>
    <br>
    <table border="1" style="width: 100%">
        <thead>
            <tr>
                <th style="width: 1%; text-align: center; padding:2px;font-size:12px">Hari</th>
                <th style="width: 2%; text-align: center; padding:2px;font-size:12px">Jam Masuk</th>
                <th style="width: 2%; text-align: center; padding:2px;font-size:12px">Jam Keluar</th>
                <th style="width: 2%; text-align: center; padding:2px;font-size:12px">Status Jam Masuk</th>
                <th style="width: 2%; text-align: center; padding:2px;font-size:12px">Status Jam Pulang</th>
                <th style="width: 2%; text-align: center; padding:2px;font-size:12px">Jam Kerja</th>
                <th style="width: 2%; text-align: center; padding:2px;font-size:12px">Over Time ( OT )</th>
                <th style="width: 2%; text-align: center; padding:2px;font-size:12px">Jumlah Cepat Pulang</th>
                <th style="width: 2%; text-align: center; padding:2px;font-size:12px">Jumlah Telat Datang</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $total_plg_cepat_null = null;
            $total_dtg_lambat_null = null;

            if (Yii::$app->request->isPost) {
                $hari_ini = date("Y-m-d", strtotime('-1 month'));
                $tgl_pertama = date('Y-m-01', strtotime($hari_ini));
                $tgl_terakhir = date('Y-m-t', strtotime($hari_ini));
            } else {
                $hari_ini = date("Y-m-d");
                $tgl_pertama = date('Y-m-01', strtotime($hari_ini));
                $tgl_terakhir = date('Y-m-t', strtotime($hari_ini));
            }

            $absensi = Absensi::find()
                ->where(['between', 'tanggal_masuk', $tgl_pertama, $tgl_terakhir])
                ->andWhere(['nip_nik' => Yii::$app->user->identity->kodeAkun])
                ->orderBy(['id_tb_absensi' => SORT_ASC])
                ->all();

            foreach ($absensi as $dataabsen) {
            ?>
                <tr>
                    <td style="width: 2%; text-align: center;font-size: 10px">
                        <?php
                        $hari = date('D', strtotime($dataabsen->tanggal_masuk));
                        echo HelperSso::hari_ini($hari) . " , " . HelperSso::tgl_indo($dataabsen->tanggal_masuk);
                        ?>
                    </td>

                    <td style="width: 2%; text-align: center;font-size: 10px">
                        <?= $dataabsen->jam_masuk == null ? $dataabsen->status : $dataabsen->jam_masuk ?>
                    </td>
                    <td style="width: 2%; text-align: center;font-size: 10px">
                        <?= $dataabsen->jam_keluar == null ? "Tidak Mengisi Jam Pulang" : $dataabsen->jam_keluar ?>
                    </td>

                    <td style="width: 2%; text-align: center;font-size: 10px">
                        <?php
                        $hari_kerja = ['Mon', 'Tue', 'Wed', 'Thu', 'Fri'];
                        $dataAbsen = date('D', strtotime($dataabsen->tanggal_masuk));

                        $jam_normal = null;
                        if (in_array($dataabsen, $hari_kerja)) {
                            $jam_normal = "08:00:00";
                        } else {
                            $jam_normal = "08:00:00";
                        }
                        $a = strtotime($jam_normal);
                        $b = strtotime($dataabsen->jam_masuk);
                        if ($dataabsen->status == 'L') {
                            echo 'Libur';
                        } else {
                            if ($b > $a) {
                                echo 'Terlambat';
                            } else if ($b == $a) {
                                echo 'Normal';
                            } else {
                                echo 'Lebih Cepat';
                            }
                        }
                        ?>
                    </td>
                    <td style="width: 2%; text-align: center;font-size: 10px">
                        <?php
                        $hari_kerja = ['Mon', 'Tue', 'Wed', 'Thu', 'Fri'];
                        $dataAbsen_hari = date('D', strtotime($dataabsen->tanggal_masuk));

                        $jam_normal_pulang = null;
                        if (in_array($dataAbsen_hari, $hari_kerja)) {
                            $jam_normal_pulang = "15:00:00";
                        } else {
                            $jam_normal_pulang = "15:00:00";
                        }
                        $a = strtotime($jam_normal_pulang);
                        $b = strtotime($dataabsen->jam_keluar);
                        if ($b) {
                            if ($dataabsen->status == 'L') {
                                echo 'Libur';
                            } else {
                                //									echo $b . "-" .$a;
                                if ($b > $a) {
                                    echo 'Normal';
                                } else if ($b == $a) {
                                    echo 'Pulang Seperti Biasa';
                                } else {
                                    echo 'Lebih Cepat';
                                }
                            }
                        } else {
                            echo 'Tidak Mengisi Jam Pulang';
                        }
                        ?>
                    </td>

                    <td style="width: 2%; text-align: center;font-size: 10px">
                        <?php

                        // var_dump(empty($dataabsen->jam_masuk));
                        if (empty($dataabsen->jam_masuk) || empty($dataabsen->jam_keluar)) {

                            echo "Tidak Mengisi Jam Pulang";
                        } else {
                            echo HelperSso::menghitung_selisih($dataabsen->jam_keluar, $dataabsen->jam_masuk);
                        }

                        ?>
                    </td>
                    <td style="width: 2%; text-align: center;font-size: 10px">
                        <?php
                        if ($dataabsen->status == 'L') {
                            echo 'Libur';
                        } else {
                            $hari_kerja = ['Mon', 'Tue', 'Wed', 'Thu', 'Fri'];
                            $dataAbsen_keluar = date('D', strtotime($dataabsen->tanggal_masuk));

                            $jam_normal_pulang = null;
                            if (in_array($dataAbsen_keluar, $hari_kerja)) {
                                $jam_normal_pulang = "15:00:00";
                            } else {
                                $jam_normal_pulang = "15:00:00";
                            }

                            $jam_keluar = strtotime($dataabsen->jam_keluar);
                            $jam_normal = strtotime($jam_normal_pulang);

                            if ($jam_keluar > $jam_normal) {

                                echo HelperSso::menghitung_jumlah_ovt($dataabsen->jam_keluar, $jam_normal_pulang);
                            } else {
                                echo 'Tidak Ada Lembur';
                            }
                        }
                        ?>
                    </td>
                    <td style="width: 2%; text-align: center;font-size: 10px">
                        <?php
                        if (is_null($dataabsen->jam_keluar)) {
                            echo 'Tidak Mengisi Jam Pulang';

                            $total_plg_cepat = 0;
                        } else {
                            if ($dataabsen->status == 'L') {
                                echo 'Libur';
                            } else {
                                $hari_kerja = ['Mon', 'Tue', 'Wed', 'Thu', 'Fri'];
                                $dataAbsen_cpt_plg = date('D', strtotime($dataabsen->tanggal_masuk));

                                $jam_normal_pulang = null;
                                if (in_array($dataAbsen_cpt_plg, $hari_kerja)) {
                                    $jam_normal_pulang = "15:00:00";
                                } else {
                                    $jam_normal_pulang = "15:00:00";
                                }

                                $jam_keluar = strtotime($dataabsen->jam_keluar);
                                $jam_normal = strtotime($jam_normal_pulang);

                                if ($jam_keluar < $jam_normal) {

                                    $total_plg_cepat = HelperSso::menghitung_jumlah_cpt_pulang($dataabsen->jam_keluar, $jam_normal_pulang);
                                    //										echo $total_plg_cepat;
                                    echo $total_plg_cepat . " Menit Lebih Cepat";
                                } else {
                                    $total_plg_cepat = 0;
                                    echo 'Tidak Pulang Cepat';
                                }
                            }
                        }
                        ?>
                    </td>
                    <td style="width: 2%; text-align: center;font-size: 10px">
                        <?php
                        if ($dataabsen->status == 'L') {
                            echo 'Libur';
                        } else {
                            $hari_kerja = ['Mon', 'Tue', 'Wed', 'Thu', 'Fri'];
                            $dataAbsen_tlt_datang = date('D', strtotime($dataabsen->tanggal_masuk));

                            $jam_normal_pulang = null;
                            if (in_array($dataAbsen_tlt_datang, $hari_kerja)) {
                                $jam_normal_masuk = "08:00:00";
                            } else {
                                $jam_normal_masuk = "08:00:00";
                            }

                            $total_tlt_datang = HelperSso::menghitung_jumlah_tlt_datang($dataabsen->tanggal_masuk, "08:00:00", $dataabsen->jam_masuk);

                            $jam_masuk = strtotime($dataabsen->jam_masuk);
                            $jam_normal_masuk = strtotime($jam_normal_masuk);
                            // var_dump($dataabsen->jam_masuk);

                            // if($jm)
                            // echo $total_tlt_datang;
                            if ($jam_masuk > $jam_normal_masuk) {
                                //     //										echo $total_plg_cepat;
                                // $tlt = $total_tlt_datang . " Menit";
                                // echo $tlt;
                                echo '-';
                            } else {
                                $total_tlt_datang = 0;
                                echo 'Tidak Datang Telat';
                            }
                        }
                        ?>
                    </td>
                </tr>

            <?php
                $total_plg_cepat_null += $total_plg_cepat;
                $total_dtg_lambat_null += $total_tlt_datang;
            } ?>
        </tbody>
    </table>
    <hr>
    <table border="1" style="width: 100%">
        <tr>
            <th style="width: 2%; text-align: center;">Jumlah Pulang Cepat</th>
            <td style="width: 2%; text-align: center;"><?= floor($total_plg_cepat_null / 60) ?>
                Jam <?= floor($total_plg_cepat_null % 60) ?> Menit
            </td>
        </tr>
        <tr>
            <th style="width: 2%; text-align: center;">Jumlah Telat Datang</th>
            <td style="width: 2%; text-align: center;">

                <?php
                if ($total_dtg_lambat_null == 0) {
                    echo "Tidak Ada Waktu Terlambat";
                } else {
                    echo floor($total_dtg_lambat_null / 60) . " Jam " . "dan " . floor($total_dtg_lambat_null % 60) . " Menit";
                }
                ?>
            </td>
        </tr>
        <tr>
            <th style="width: 2%; text-align: center;">Jumlah Kelebihan Jam Kerja</th>
            <td>

            </td>
        </tr>
    </table>
</div>