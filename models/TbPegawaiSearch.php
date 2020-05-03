<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TbPegawai;

/**
 * TbPegawaiSearch represents the model behind the search form of `app\models\TbPegawai`.
 */
class TbPegawaiSearch extends TbPegawai
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pegawai_id', 'pendidikan_terakhir_id', 'kode_pangkat_cpns', 'masa_kerja_tahun_cpns', 'masa_kerja_bulan_cpns', 'tinggi_keterangan_badan', 'berat_badan_keterangan_badan', 'status_aktif_pegawai', 'kode_pos', 'status_kepegawaian_id', 'jenis_kepegawaian_id', 'jenis_jabatan', 'fungsional_struktural'], 'integer'],
            [['nip', 'nama_lengkap', 'gelar_sarjana_depan', 'gelar_sarjana_belakang', 'tempat_lahir', 'tanggal_lahir', 'jenis_kelamin', 'nomor_karpeg', 'nomor_kartu_askes', 'nomor_karis_karsu', 'npwp', 'nomor_ktp', 'nota_persetujuan_bkn_nomor_cpns', 'nota_persetujuan_bkn_tanggal_cpns', 'pejabat_yang_menetapkan_cpns', 'sk_cpns_nomor_cpns', 'sk_cpns_tanggal_cpns', 'tmt_cpns', 'pejabat_yang_menetapkan_pns', 'sk_nomor_pns', 'sk_tanggal_pns', 'kode_pangkat_pns', 'tmt_pns', 'sumpah_janji_pns', 'masa_kerja_tahun_pns', 'masa_kerja_bulan_pns', 'status_perkawinan', 'rambut_keterangan_badan', 'bentuk_muka_keterangan_badan', 'warna_kulit_keterangan_badan', 'ciri_ciri_khas_keterangan_badan', 'cacat_tubuh_keterangan_badan', 'kegemaran_1', 'kegemaran_2', 'kegemaran_3', 'kode_kategori_pegawai', 'pangkat_terakhir_id', 'agama', 'alamat_tempat_tinggal', 'rt_tempat_tinggal', 'rw_tempat_tinggal', 'desa_kelurahan', 'kecamatan', 'kabupaten_kota', 'provinsi', 'no_telepon_1', 'no_telepon_2', 'golongan_darah', 'kode_jabatan', 'kode_bagian', 'tmt_jabatan'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = TbPegawai::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'pegawai_id' => $this->pegawai_id,
            'pendidikan_terakhir_id' => $this->pendidikan_terakhir_id,
            'tanggal_lahir' => $this->tanggal_lahir,
            'nota_persetujuan_bkn_tanggal_cpns' => $this->nota_persetujuan_bkn_tanggal_cpns,
            'sk_cpns_tanggal_cpns' => $this->sk_cpns_tanggal_cpns,
            'kode_pangkat_cpns' => $this->kode_pangkat_cpns,
            'tmt_cpns' => $this->tmt_cpns,
            'masa_kerja_tahun_cpns' => $this->masa_kerja_tahun_cpns,
            'masa_kerja_bulan_cpns' => $this->masa_kerja_bulan_cpns,
            'tmt_pns' => $this->tmt_pns,
            'tinggi_keterangan_badan' => $this->tinggi_keterangan_badan,
            'berat_badan_keterangan_badan' => $this->berat_badan_keterangan_badan,
            'status_aktif_pegawai' => $this->status_aktif_pegawai,
            'kode_pos' => $this->kode_pos,
            'status_kepegawaian_id' => $this->status_kepegawaian_id,
            'jenis_kepegawaian_id' => $this->jenis_kepegawaian_id,
            'jenis_jabatan' => $this->jenis_jabatan,
            'fungsional_struktural' => $this->fungsional_struktural,
            'tmt_jabatan' => $this->tmt_jabatan,
        ]);

        $query->andFilterWhere(['ilike', 'nip', $this->nip])
            ->andFilterWhere(['ilike', 'nama_lengkap', $this->nama_lengkap])
            ->andFilterWhere(['ilike', 'gelar_sarjana_depan', $this->gelar_sarjana_depan])
            ->andFilterWhere(['ilike', 'gelar_sarjana_belakang', $this->gelar_sarjana_belakang])
            ->andFilterWhere(['ilike', 'tempat_lahir', $this->tempat_lahir])
            ->andFilterWhere(['ilike', 'jenis_kelamin', $this->jenis_kelamin])
            ->andFilterWhere(['ilike', 'nomor_karpeg', $this->nomor_karpeg])
            ->andFilterWhere(['ilike', 'nomor_kartu_askes', $this->nomor_kartu_askes])
            ->andFilterWhere(['ilike', 'nomor_karis_karsu', $this->nomor_karis_karsu])
            ->andFilterWhere(['ilike', 'npwp', $this->npwp])
            ->andFilterWhere(['ilike', 'nomor_ktp', $this->nomor_ktp])
            ->andFilterWhere(['ilike', 'nota_persetujuan_bkn_nomor_cpns', $this->nota_persetujuan_bkn_nomor_cpns])
            ->andFilterWhere(['ilike', 'pejabat_yang_menetapkan_cpns', $this->pejabat_yang_menetapkan_cpns])
            ->andFilterWhere(['ilike', 'sk_cpns_nomor_cpns', $this->sk_cpns_nomor_cpns])
            ->andFilterWhere(['ilike', 'pejabat_yang_menetapkan_pns', $this->pejabat_yang_menetapkan_pns])
            ->andFilterWhere(['ilike', 'sk_nomor_pns', $this->sk_nomor_pns])
            ->andFilterWhere(['ilike', 'sk_tanggal_pns', $this->sk_tanggal_pns])
            ->andFilterWhere(['ilike', 'kode_pangkat_pns', $this->kode_pangkat_pns])
            ->andFilterWhere(['ilike', 'sumpah_janji_pns', $this->sumpah_janji_pns])
            ->andFilterWhere(['ilike', 'masa_kerja_tahun_pns', $this->masa_kerja_tahun_pns])
            ->andFilterWhere(['ilike', 'masa_kerja_bulan_pns', $this->masa_kerja_bulan_pns])
            ->andFilterWhere(['ilike', 'status_perkawinan', $this->status_perkawinan])
            ->andFilterWhere(['ilike', 'rambut_keterangan_badan', $this->rambut_keterangan_badan])
            ->andFilterWhere(['ilike', 'bentuk_muka_keterangan_badan', $this->bentuk_muka_keterangan_badan])
            ->andFilterWhere(['ilike', 'warna_kulit_keterangan_badan', $this->warna_kulit_keterangan_badan])
            ->andFilterWhere(['ilike', 'ciri_ciri_khas_keterangan_badan', $this->ciri_ciri_khas_keterangan_badan])
            ->andFilterWhere(['ilike', 'cacat_tubuh_keterangan_badan', $this->cacat_tubuh_keterangan_badan])
            ->andFilterWhere(['ilike', 'kegemaran_1', $this->kegemaran_1])
            ->andFilterWhere(['ilike', 'kegemaran_2', $this->kegemaran_2])
            ->andFilterWhere(['ilike', 'kegemaran_3', $this->kegemaran_3])
            ->andFilterWhere(['ilike', 'kode_kategori_pegawai', $this->kode_kategori_pegawai])
            ->andFilterWhere(['ilike', 'pangkat_terakhir_id', $this->pangkat_terakhir_id])
            ->andFilterWhere(['ilike', 'agama', $this->agama])
            ->andFilterWhere(['ilike', 'alamat_tempat_tinggal', $this->alamat_tempat_tinggal])
            ->andFilterWhere(['ilike', 'rt_tempat_tinggal', $this->rt_tempat_tinggal])
            ->andFilterWhere(['ilike', 'rw_tempat_tinggal', $this->rw_tempat_tinggal])
            ->andFilterWhere(['ilike', 'desa_kelurahan', $this->desa_kelurahan])
            ->andFilterWhere(['ilike', 'kecamatan', $this->kecamatan])
            ->andFilterWhere(['ilike', 'kabupaten_kota', $this->kabupaten_kota])
            ->andFilterWhere(['ilike', 'provinsi', $this->provinsi])
            ->andFilterWhere(['ilike', 'no_telepon_1', $this->no_telepon_1])
            ->andFilterWhere(['ilike', 'no_telepon_2', $this->no_telepon_2])
            ->andFilterWhere(['ilike', 'golongan_darah', $this->golongan_darah])
            ->andFilterWhere(['ilike', 'kode_jabatan', $this->kode_jabatan])
            ->andFilterWhere(['ilike', 'kode_bagian', $this->kode_bagian]);

        return $dataProvider;
    }
}
