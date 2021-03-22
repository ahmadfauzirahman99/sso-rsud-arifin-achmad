<?php

namespace app\controllers;

use app\models\Absensi;
use app\models\RiwayatPenempatan;
use app\models\TbPegawai;
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
                    'rw.atasan_langsung' => $riwayatPenempatan->penempatan,
                    'rw.status_aktif' => 1,
                    'ab.tanggal_masuk' => date("Y-m-d")
                ]
            )
            ->asArray()
            ->all();


        return $this->render('absensi', ['allRekan' => $allRekan]);
    }
}
