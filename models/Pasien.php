<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pendaftaran.pasien".
 *
 * @property string $kode
 * @property string $status_kawin_kode
 * @property string $agama_kode
 * @property string $pendidikan_kode
 * @property string $pekerjaan_kode
 * @property string $kewarganegaraan_kode
 * @property string $jenis_identitas_kode
 * @property string $suku_kode
 * @property string $no_identitas
 * @property string|null $nama
 * @property string|null $ayah_nama
 * @property string|null $ibu_nama
 * @property string|null $nama_pasangan
 * @property string $tempat_lahir
 * @property string $tgl_lahir
 * @property string $alamat
 * @property string $jkel l = laki-laki, p = perempuan
 * @property int|null $penghasilan rata-rata penghasilan keluarga perbln
 * @property string|null $no_telp
 * @property string|null $alergi
 * @property int $created_by
 * @property string $created_at
 * @property int|null $updated_by
 * @property string|null $updated_at
 * @property string|null $tempat_kerja
 * @property string|null $kelurahan_kode
 * @property string|null $kedudukan_keluarga 1=Kepala Keluarga,2=Istri,3=Anak
 * @property string|null $alamat_tempat_kerja
 * @property int|null $anak_ke
 * @property int|null $istri_ke
 * @property int|null $jml_anak
 * @property string|null $ayah_no_rekam_medis
 * @property string|null $ibu_no_rekam_medis
 * @property string|null $goldar
 * @property string|null $jurusan_kode
 * @property string|null $deleted_at
 * @property int|null $deleted_by
 * @property string|null $rt
 * @property string|null $rw
 */
class Pasien extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pendaftaran.pasien';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kode', 'status_kawin_kode', 'agama_kode', 'pendidikan_kode', 'pekerjaan_kode', 'kewarganegaraan_kode', 'jenis_identitas_kode', 'suku_kode', 'no_identitas', 'tempat_lahir', 'tgl_lahir', 'alamat', 'jkel', 'created_by', 'created_at'], 'required'],
            [['tgl_lahir', 'created_at', 'updated_at', 'deleted_at'], 'safe'],
            [['alamat', 'alergi'], 'string'],
            [['penghasilan', 'created_by', 'updated_by', 'anak_ke', 'istri_ke', 'jml_anak', 'deleted_by'], 'default', 'value' => null],
            [['penghasilan', 'created_by', 'updated_by', 'anak_ke', 'istri_ke', 'jml_anak', 'deleted_by'], 'integer'],
            [['kode', 'status_kawin_kode', 'agama_kode', 'pendidikan_kode', 'pekerjaan_kode', 'kewarganegaraan_kode', 'jenis_identitas_kode', 'suku_kode', 'kelurahan_kode', 'ayah_no_rekam_medis', 'ibu_no_rekam_medis', 'jurusan_kode'], 'string', 'max' => 10],
            [['no_identitas', 'no_telp'], 'string', 'max' => 50],
            [['nama', 'ayah_nama', 'ibu_nama', 'nama_pasangan'], 'string', 'max' => 150],
            [['tempat_lahir', 'tempat_kerja', 'alamat_tempat_kerja'], 'string', 'max' => 255],
            [['jkel', 'kedudukan_keluarga'], 'string', 'max' => 1],
            [['goldar'], 'string', 'max' => 2],
            [['rt', 'rw'], 'string', 'max' => 5],
            [['kode'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'kode' => 'Kode',
            'status_kawin_kode' => 'Status Kawin Kode',
            'agama_kode' => 'Agama Kode',
            'pendidikan_kode' => 'Pendidikan Kode',
            'pekerjaan_kode' => 'Pekerjaan Kode',
            'kewarganegaraan_kode' => 'Kewarganegaraan Kode',
            'jenis_identitas_kode' => 'Jenis Identitas Kode',
            'suku_kode' => 'Suku Kode',
            'no_identitas' => 'No Identitas',
            'nama' => 'Nama',
            'ayah_nama' => 'Ayah Nama',
            'ibu_nama' => 'Ibu Nama',
            'nama_pasangan' => 'Nama Pasangan',
            'tempat_lahir' => 'Tempat Lahir',
            'tgl_lahir' => 'Tgl Lahir',
            'alamat' => 'Alamat',
            'jkel' => 'Jkel',
            'penghasilan' => 'Penghasilan',
            'no_telp' => 'No Telp',
            'alergi' => 'Alergi',
            'created_by' => 'Created By',
            'created_at' => 'Created At',
            'updated_by' => 'Updated By',
            'updated_at' => 'Updated At',
            'tempat_kerja' => 'Tempat Kerja',
            'kelurahan_kode' => 'Kelurahan Kode',
            'kedudukan_keluarga' => 'Kedudukan Keluarga',
            'alamat_tempat_kerja' => 'Alamat Tempat Kerja',
            'anak_ke' => 'Anak Ke',
            'istri_ke' => 'Istri Ke',
            'jml_anak' => 'Jml Anak',
            'ayah_no_rekam_medis' => 'Ayah No Rekam Medis',
            'ibu_no_rekam_medis' => 'Ibu No Rekam Medis',
            'goldar' => 'Goldar',
            'jurusan_kode' => 'Jurusan Kode',
            'deleted_at' => 'Deleted At',
            'deleted_by' => 'Deleted By',
            'rt' => 'Rt',
            'rw' => 'Rw',
        ];
    }
}
