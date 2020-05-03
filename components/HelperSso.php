<?php


namespace app\components;


use app\models\TbPegawai;

class HelperSso
{
    Const TypeUser = [
        'ROOT' => 'ROOT',
        'MEDIS' => 'MEDIS',
        'NON-MEDIS' => 'NON-MEDIS'
    ];

    Const TypeUserStatus = [
        '0' => 'Pending',
        '1' => 'Aktif',
        '2' => 'Tidak Aktif'
    ];

    public static function getDataPegawai()
    {
        $r = TbPegawai::find()->orderBy(['nama_lengkap' => SORT_ASC])->all();

        return $r;
    }
}