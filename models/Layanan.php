<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pendaftaran.layanan".
 *
 * @property int $id
 * @property string $registrasi_kode
 * @property int $jenis_layanan
 * @property string $tgl_masuk
 * @property string|null $tgl_keluar
 * @property int $unit_kode
 * @property int|null $nomor_urut
 * @property int|null $panggil_perawat
 * @property int|null $dipanggil_perawat
 * @property int|null $kamar_id reff medis.kamar.id
 * @property string|null $kelas_rawat_kode
 * @property string|null $unit_asal_kode
 * @property string|null $unit_tujuan_kode
 * @property string|null $cara_masuk_unit_kode
 * @property string|null $cara_keluar_kode
 * @property string|null $status_keluar_kode
 * @property string|null $keterangan
 * @property int $created_by
 * @property string $created_at
 * @property int|null $updated_by
 * @property string|null $updated_at
 * @property string|null $deleted_at
 * @property int|null $deleted_by
 * @property int|null $panggil_dokter
 * @property int|null $dipanggil_dokter
 */
class Layanan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pendaftaran.layanan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['registrasi_kode', 'jenis_layanan', 'tgl_masuk', 'unit_kode', 'created_by', 'created_at'], 'required'],
            [['jenis_layanan', 'unit_kode', 'nomor_urut', 'panggil_perawat', 'dipanggil_perawat', 'kamar_id', 'created_by', 'updated_by', 'deleted_by', 'panggil_dokter', 'dipanggil_dokter'], 'default', 'value' => null],
            [['jenis_layanan', 'unit_kode', 'nomor_urut', 'panggil_perawat', 'dipanggil_perawat', 'kamar_id', 'created_by', 'updated_by', 'deleted_by', 'panggil_dokter', 'dipanggil_dokter'], 'integer'],
            [['tgl_masuk', 'tgl_keluar', 'created_at', 'updated_at', 'deleted_at'], 'safe'],
            [['keterangan'], 'string'],
            [['registrasi_kode', 'kelas_rawat_kode', 'unit_asal_kode', 'unit_tujuan_kode', 'cara_masuk_unit_kode', 'cara_keluar_kode', 'status_keluar_kode'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'registrasi_kode' => 'Registrasi Kode',
            'jenis_layanan' => 'Jenis Layanan',
            'tgl_masuk' => 'Tgl Masuk',
            'tgl_keluar' => 'Tgl Keluar',
            'unit_kode' => 'Unit Kode',
            'nomor_urut' => 'Nomor Urut',
            'panggil_perawat' => 'Panggil Perawat',
            'dipanggil_perawat' => 'Dipanggil Perawat',
            'kamar_id' => 'Kamar ID',
            'kelas_rawat_kode' => 'Kelas Rawat Kode',
            'unit_asal_kode' => 'Unit Asal Kode',
            'unit_tujuan_kode' => 'Unit Tujuan Kode',
            'cara_masuk_unit_kode' => 'Cara Masuk Unit Kode',
            'cara_keluar_kode' => 'Cara Keluar Kode',
            'status_keluar_kode' => 'Status Keluar Kode',
            'keterangan' => 'Keterangan',
            'created_by' => 'Created By',
            'created_at' => 'Created At',
            'updated_by' => 'Updated By',
            'updated_at' => 'Updated At',
            'deleted_at' => 'Deleted At',
            'deleted_by' => 'Deleted By',
            'panggil_dokter' => 'Panggil Dokter',
            'dipanggil_dokter' => 'Dipanggil Dokter',
        ];
    }
}
