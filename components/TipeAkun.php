<?php


namespace app\components;


class TipeAkun
{
    const ROOT = 'ROOT';
    const MEDIS = 'MEDIS';
    const NONMEDIS = 'NONMEDIS';
    const APLIKASI = 'APLIKASI';
    const Eksternal = 'Eksternal';


    const HakAkses = [
        'NONMEDIS' => ['Aplikasi Backoffice Akuntansi RSUD', 'Aplikasi HRM Kepegawaian RSUD'],
        'MEDIS' => ['Aplikasi Pendaftaran RSUD', 'Aplikasi  ( Laboratorium dan Radiolog dan Visum) RSUD', 'Aplikasi Rawat Inap RSUD', 'Aplikasi Surveilence RSUD', 'Aplikasi Kasbank RSUD', 'Aplikasi Farmasi RSUD', 'Aplikasi Rawat Jalan RSUD']

    ];

    public static $items = [
        [
            'id' => 'MEDIS',
            'text' => 'Medis',
            'icon' => 'fa fa-user text-aqua',
            'keywords' => ['Aplikasi Pendaftaran RSUD', 'Aplikasi  ( Laboratorium dan Radiolog dan Visum) RSUD', 'Aplikasi Rawat Inap RSUD', 'Aplikasi Surveilence RSUD', 'Aplikasi Kasbank RSUD', 'Aplikasi Farmasi RSUD', 'Aplikasi Rawat Jalan RSUD'],
        ],
        [
            'id' => 'NONMEDIS',
            'text' => 'Non Medis',
            'icon' => 'fa fa-user text-green',
            'keywords' => ['Aplikasi Backoffice Akuntansi RSUD', 'Aplikasi HRM Kepegawaian RSUD'],
        ],
        [
            'id' => 'Eksternal',
            'text' => 'Eksternal',
            'icon' => 'fa fa-user text-orange',
            'keywords' => ['eksternal', 'eks'],
        ],
        [
            'id' => 'ROOT',
            'text' => 'ROOT',
            'icon' => 'fa fa-application text-green',
            'keywords' => ['aplikasi', 'app'],
        ],
        [
            'id' => 'APLIKASI',
            'text' => 'APLIKASI',
            'icon' => 'fa fa-application text-green',
            'keywords' => ['aplikasi', 'app'],
        ],
    ];

    static function multi_in_array($value, $array)
    {
        foreach ($array as $item) {
            if (!is_array($item)) {
                if ($item == $value) {
                    return true;
                }
                continue;
            }

            if (in_array($value, $item)) {
                return true;
            } else if (self::multi_in_array($value, $item)) {
                return true;
            }
        }
        return false;
    }
}