<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "absensi.tb_absensi".
 *
 * @property string|null $id_pegawai
 * @property string|null $nip_nik
 * @property string|null $jam_masuk
 * @property string|null $jam_keluar
 * @property string|null $tanggal_masuk
 * @property string|null $lat
 * @property string|null $long
 * @property string|null $status
 * @property int $id_tb_absensi
 * @property string|null $how
 */
class Absensi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'absensi.tb_absensi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['jam_masuk', 'jam_keluar', 'tanggal_masuk'], 'safe'],
            [['lat', 'long'], 'string'],
            [['id_pegawai'], 'string', 'max' => 30],
            [['nip_nik'], 'string', 'max' => 40],
            [['status'], 'string', 'max' => 10],
            [['how'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_pegawai' => 'Id Pegawai',
            'nip_nik' => 'Nip Nik',
            'jam_masuk' => 'Jam Masuk',
            'jam_keluar' => 'Jam Keluar',
            'tanggal_masuk' => 'Tanggal Masuk',
            'lat' => 'Lat',
            'long' => 'Long',
            'status' => 'Status',
            'id_tb_absensi' => 'Id Tb Absensi',
            'how' => 'How',
        ];
    }
}
