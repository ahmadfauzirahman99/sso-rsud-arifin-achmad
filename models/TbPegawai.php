<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tb_pegawai".
 *
 * @property int $pegawai_id
 * @property string $nip
 * @property string|null $nama_lengkap
 * @property string|null $gelar_sarjana_depan
 * @property string|null $gelar_sarjana_belakang
 * @property int|null $pendidikan_terakhir_id
 * @property string|null $tempat_lahir
 * @property string|null $tanggal_lahir
 * @property string|null $jenis_kelamin
 * @property string|null $nomor_karpeg
 * @property string|null $nomor_kartu_askes
 * @property string|null $nomor_karis_karsu
 * @property string|null $npwp
 * @property string|null $nomor_ktp
 * @property string|null $nota_persetujuan_bkn_nomor_cpns
 * @property string|null $nota_persetujuan_bkn_tanggal_cpns
 * @property string|null $pejabat_yang_menetapkan_cpns
 * @property string|null $sk_cpns_nomor_cpns
 * @property string|null $sk_cpns_tanggal_cpns
 * @property int|null $kode_pangkat_cpns
 * @property string|null $tmt_cpns
 * @property int|null $masa_kerja_tahun_cpns
 * @property int|null $masa_kerja_bulan_cpns
 * @property string|null $pejabat_yang_menetapkan_pns
 * @property string|null $sk_nomor_pns
 * @property string|null $sk_tanggal_pns
 * @property string|null $kode_pangkat_pns
 * @property string|null $tmt_pns
 * @property string|null $sumpah_janji_pns
 * @property string|null $masa_kerja_tahun_pns
 * @property string|null $masa_kerja_bulan_pns
 * @property string|null $status_perkawinan
 * @property int|null $tinggi_keterangan_badan
 * @property int|null $berat_badan_keterangan_badan
 * @property string|null $rambut_keterangan_badan
 * @property string|null $bentuk_muka_keterangan_badan
 * @property string|null $warna_kulit_keterangan_badan
 * @property string|null $ciri_ciri_khas_keterangan_badan
 * @property string|null $cacat_tubuh_keterangan_badan
 * @property string|null $kegemaran_1
 * @property string|null $kegemaran_2
 * @property string|null $kegemaran_3
 * @property int|null $status_aktif_pegawai
 * @property string|null $kode_kategori_pegawai
 * @property string|null $pangkat_terakhir_id
 * @property string|null $agama
 * @property string|null $alamat_tempat_tinggal
 * @property string|null $rt_tempat_tinggal
 * @property string|null $rw_tempat_tinggal
 * @property string|null $desa_kelurahan
 * @property string|null $kecamatan
 * @property string|null $kabupaten_kota
 * @property string|null $provinsi
 * @property int|null $kode_pos
 * @property string|null $no_telepon_1
 * @property string|null $no_telepon_2
 * @property string|null $golongan_darah
 * @property int|null $status_kepegawaian_id
 * @property int|null $jenis_kepegawaian_id
 * @property int|null $jenis_jabatan
 * @property string|null $kode_jabatan
 * @property string|null $kode_bagian
 * @property int|null $fungsional_struktural
 * @property string|null $tmt_jabatan
 */
class TbPegawai extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tb_pegawai';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('dbSimpeg');
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nip'], 'required'],
            [['nip', 'pejabat_yang_menetapkan_cpns', 'sk_cpns_nomor_cpns', 'kode_jabatan', 'kode_bagian'], 'string'],
            [['pendidikan_terakhir_id', 'kode_pangkat_cpns', 'masa_kerja_tahun_cpns', 'masa_kerja_bulan_cpns', 'tinggi_keterangan_badan', 'berat_badan_keterangan_badan', 'status_aktif_pegawai', 'kode_pos', 'status_kepegawaian_id', 'jenis_kepegawaian_id', 'jenis_jabatan', 'fungsional_struktural'], 'default', 'value' => null],
            [['pendidikan_terakhir_id', 'kode_pangkat_cpns', 'masa_kerja_tahun_cpns', 'masa_kerja_bulan_cpns', 'tinggi_keterangan_badan', 'berat_badan_keterangan_badan', 'status_aktif_pegawai', 'kode_pos', 'status_kepegawaian_id', 'jenis_kepegawaian_id', 'jenis_jabatan', 'fungsional_struktural'], 'integer'],
            [['tanggal_lahir', 'nota_persetujuan_bkn_tanggal_cpns', 'sk_cpns_tanggal_cpns', 'tmt_cpns', 'tmt_pns', 'tmt_jabatan'], 'safe'],
            [['nama_lengkap'], 'string', 'max' => 80],
            [['gelar_sarjana_depan', 'status_perkawinan'], 'string', 'max' => 20],
            [['gelar_sarjana_belakang', 'tempat_lahir', 'nomor_karpeg', 'nomor_kartu_askes', 'nomor_karis_karsu', 'nota_persetujuan_bkn_nomor_cpns', 'pangkat_terakhir_id', 'desa_kelurahan', 'kecamatan', 'kabupaten_kota', 'provinsi'], 'string', 'max' => 30],
            [['jenis_kelamin'], 'string', 'max' => 10],
            [['npwp', 'nomor_ktp', 'pejabat_yang_menetapkan_pns', 'sk_nomor_pns', 'rambut_keterangan_badan', 'bentuk_muka_keterangan_badan', 'warna_kulit_keterangan_badan', 'ciri_ciri_khas_keterangan_badan', 'cacat_tubuh_keterangan_badan', 'kegemaran_1', 'kegemaran_2', 'kegemaran_3'], 'string', 'max' => 50],
            [['sk_tanggal_pns'], 'string', 'max' => 255],
            [['kode_pangkat_pns', 'sumpah_janji_pns', 'rt_tempat_tinggal', 'rw_tempat_tinggal'], 'string', 'max' => 5],
            [['masa_kerja_tahun_pns', 'kode_kategori_pegawai'], 'string', 'max' => 4],
            [['masa_kerja_bulan_pns'], 'string', 'max' => 2],
            [['agama', 'no_telepon_1', 'no_telepon_2'], 'string', 'max' => 15],
            [['alamat_tempat_tinggal'], 'string', 'max' => 100],
            [['golongan_darah'], 'string', 'max' => 3],
            [['nip'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'pegawai_id' => 'Pegawai ID',
            'nip' => 'Nip',
            'nama_lengkap' => 'Nama Lengkap',
            'gelar_sarjana_depan' => 'Gelar Sarjana Depan',
            'gelar_sarjana_belakang' => 'Gelar Sarjana Belakang',
            'pendidikan_terakhir_id' => 'Pendidikan Terakhir ID',
            'tempat_lahir' => 'Tempat Lahir',
            'tanggal_lahir' => 'Tanggal Lahir',
            'jenis_kelamin' => 'Jenis Kelamin',
            'nomor_karpeg' => 'Nomor Karpeg',
            'nomor_kartu_askes' => 'Nomor Kartu Askes',
            'nomor_karis_karsu' => 'Nomor Karis Karsu',
            'npwp' => 'Npwp',
            'nomor_ktp' => 'Nomor Ktp',
            'nota_persetujuan_bkn_nomor_cpns' => 'Nota Persetujuan Bkn Nomor Cpns',
            'nota_persetujuan_bkn_tanggal_cpns' => 'Nota Persetujuan Bkn Tanggal Cpns',
            'pejabat_yang_menetapkan_cpns' => 'Pejabat Yang Menetapkan Cpns',
            'sk_cpns_nomor_cpns' => 'Sk Cpns Nomor Cpns',
            'sk_cpns_tanggal_cpns' => 'Sk Cpns Tanggal Cpns',
            'kode_pangkat_cpns' => 'Kode Pangkat Cpns',
            'tmt_cpns' => 'Tmt Cpns',
            'masa_kerja_tahun_cpns' => 'Masa Kerja Tahun Cpns',
            'masa_kerja_bulan_cpns' => 'Masa Kerja Bulan Cpns',
            'pejabat_yang_menetapkan_pns' => 'Pejabat Yang Menetapkan Pns',
            'sk_nomor_pns' => 'Sk Nomor Pns',
            'sk_tanggal_pns' => 'Sk Tanggal Pns',
            'kode_pangkat_pns' => 'Kode Pangkat Pns',
            'tmt_pns' => 'Tmt Pns',
            'sumpah_janji_pns' => 'Sumpah Janji Pns',
            'masa_kerja_tahun_pns' => 'Masa Kerja Tahun Pns',
            'masa_kerja_bulan_pns' => 'Masa Kerja Bulan Pns',
            'status_perkawinan' => 'Status Perkawinan',
            'tinggi_keterangan_badan' => 'Tinggi Keterangan Badan',
            'berat_badan_keterangan_badan' => 'Berat Badan Keterangan Badan',
            'rambut_keterangan_badan' => 'Rambut Keterangan Badan',
            'bentuk_muka_keterangan_badan' => 'Bentuk Muka Keterangan Badan',
            'warna_kulit_keterangan_badan' => 'Warna Kulit Keterangan Badan',
            'ciri_ciri_khas_keterangan_badan' => 'Ciri Ciri Khas Keterangan Badan',
            'cacat_tubuh_keterangan_badan' => 'Cacat Tubuh Keterangan Badan',
            'kegemaran_1' => 'Kegemaran 1',
            'kegemaran_2' => 'Kegemaran 2',
            'kegemaran_3' => 'Kegemaran 3',
            'status_aktif_pegawai' => 'Status Aktif Pegawai',
            'kode_kategori_pegawai' => 'Kode Kategori Pegawai',
            'pangkat_terakhir_id' => 'Pangkat Terakhir ID',
            'agama' => 'Agama',
            'alamat_tempat_tinggal' => 'Alamat Tempat Tinggal',
            'rt_tempat_tinggal' => 'Rt Tempat Tinggal',
            'rw_tempat_tinggal' => 'Rw Tempat Tinggal',
            'desa_kelurahan' => 'Desa Kelurahan',
            'kecamatan' => 'Kecamatan',
            'kabupaten_kota' => 'Kabupaten Kota',
            'provinsi' => 'Provinsi',
            'kode_pos' => 'Kode Pos',
            'no_telepon_1' => 'No Telepon 1',
            'no_telepon_2' => 'No Telepon 2',
            'golongan_darah' => 'Golongan Darah',
            'status_kepegawaian_id' => 'Status Kepegawaian ID',
            'jenis_kepegawaian_id' => 'Jenis Kepegawaian ID',
            'jenis_jabatan' => 'Jenis Jabatan',
            'kode_jabatan' => 'Kode Jabatan',
            'kode_bagian' => 'Kode Bagian',
            'fungsional_struktural' => 'Fungsional Struktural',
            'tmt_jabatan' => 'Tmt Jabatan',
        ];
    }
}
