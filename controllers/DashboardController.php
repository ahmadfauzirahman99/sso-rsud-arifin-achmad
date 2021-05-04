<?php

namespace app\controllers;

use app\models\Absensi;
use app\models\RiwayatPenempatan;
use app\models\TbPegawai;
use app\models\UnitIki;
use app\models\UnitPenempatan;
use Codeception\Lib\Di;
use Yii;

class DashboardController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionAbsensi()
    {
        $riwayatPenempatan = RiwayatPenempatan::find()->where(
            [
                'id_nip_nrp' => Yii::$app->user->identity->kodeAkun,
                'status_aktif' => 1
            ]
        )->one();

        // echo '<pre>';
        // var_dump($riwayatPenempatan);
        // exit;




        $allRekan = RiwayatPenempatan::find()
            ->alias('rw')
            ->select(
                [
                    'rw.id_nip_nrp',
                    'pg.nama_lengkap',
                    'ab.jam_masuk'
                ]
            )
            ->leftJoin(TbPegawai::tableName() . " as pg", "pg.id_nip_nrp=rw.id_nip_nrp")
            ->leftJoin(Absensi::tableName() . " as ab", "ab.nip_nik=rw.id_nip_nrp")
            ->where(
                [
                    'rw.atasan_langsung' => $riwayatPenempatan->atasan_langsung,
                    'rw.status_aktif' => 1,
                    'ab.tanggal_masuk' => date("Y-m-d")
                ]
            )
            ->asArray()
            ->all();
        // ->createCommand()->getRawSql();

        // print_r($allRekan);
        // exit;


        return $this->render('absensi', ['allRekan' => $allRekan]);
    }

    public function actionRekapAbsensiUnit()
    {

        $pegawai = TbPegawai::find()
            ->alias('p')
            ->select(
                [
                    'p.*',
                    'rw.*',
                    'up.nama as namaUnit'
                ]
            )
            ->leftJoin(RiwayatPenempatan::tableName() . " as rw", "rw.id_nip_nrp=p.id_nip_nrp")
            ->leftJoin(UnitPenempatan::tableName() . " as up", "up.kode=rw.unit_kerja")
            ->leftJoin(UnitIki::tableName() . " as u","u.kode_unit=rw.unit_kerja")
            ->where(['p.status_aktif_pegawai' => 1])
            ->andWhere(['rw.status_aktif' => 1])
            // ->andWhere(['rw.atasan_langsung' => 37])
            ->orderBy('p.nama_lengkap ASC')
            ->asArray()
            ->limit(100)
            ->all();
        
       

        $tanggal = cal_days_in_month(CAL_GREGORIAN, 3, 2021);

        return $this->render('rekap-absensi-unit', [
            'absensi' => $pegawai,
            'tanggal' => $tanggal
        ]);
    }
}
