<?php


namespace app\components;


use app\models\DataMasterStatusKepegawain;
use app\models\Sesi;
use app\models\TbPegawai;

class HelperSso
{
    const TypeUser = [
        'ROOT' => 'ROOT',
        'MEDIS' => 'MEDIS',
        'NONMEDIS' => 'NONMEDIS',
        'APLIKASI' => 'APLIKASI',
        'Eksternal' => 'Eksternal',
    ];

    const TypeUserStatus = [
        '0' => 'Pending',
        '1' => 'Aktif',
        '2' => 'Tidak Aktif'
    ];

    public static function getDataPegawai()
    {
        $r = TbPegawai::find()->orderBy(['nama_lengkap' => SORT_ASC])->all();

        return $r;
    }


    public static function getDataPegawaiByNip($id)
    {
        $r = TbPegawai::find()
            ->where(['id_nip_nrp' => $id])->one();
        return $r;
    }

    static function getLogLogin($id)
    {
        $r = Sesi::find()->where(['ida' => $id])->orderBy(['tgb' => SORT_DESC])->limit(5)->all();
        return $r;
    }
}