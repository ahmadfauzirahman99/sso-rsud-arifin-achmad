<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pegawai.tb_vaksinasi".
 *
 * @property int $id_vaksinasi
 * @property int $id_status_covid
 * @property int|null $vaksin_ke
 * @property string|null $tanggal_daftar_vaksin
 * @property string|null $tanggal_vaksin
 * @property string|null $alamat_vaksin
 * @property string|null $penyelenggaraan
 */
class VaksinasiPegawai extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pegawai.tb_vaksinasi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_status_covid'], 'required'],
            [['id_status_covid', 'vaksin_ke'], 'default', 'value' => null],
            [['id_status_covid', 'vaksin_ke'], 'integer'],
            [['tanggal_daftar_vaksin', 'tanggal_vaksin'], 'safe'],
            [['alamat_vaksin', 'penyelenggaraan'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_vaksinasi' => 'Id Vaksinasi',
            'id_status_covid' => 'Id Status Covid',
            'vaksin_ke' => 'Vaksin Ke',
            'tanggal_daftar_vaksin' => 'Tanggal Daftar Vaksin',
            'tanggal_vaksin' => 'Tanggal Vaksin',
            'alamat_vaksin' => 'Alamat Vaksin',
            'penyelenggaraan' => 'Penyelenggaraan',
        ];
    }
}
