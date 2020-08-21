<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sip.tb_riwayat_penempatan".
 *
 * @property int $id
 * @property string $id_nip_nrp
 * @property string $nota_dinas
 * @property string $tanggal
 * @property string $penempatan
 * @property string|null $dokumen
 * @property int|null $rumpun_unit
 * @property int|null $sdm_rumpun
 * @property int|null $sdm_sub_rumpun
 * @property int|null $sdm_jenis
 * @property string|null $jabatan
 */
class RiwayatPenempatan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sip.tb_riwayat_penempatan';
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
            [['id_nip_nrp', 'nota_dinas', 'tanggal', 'penempatan'], 'required'],
            [['tanggal'], 'safe'],
            [['dokumen'], 'string'],
            [['rumpun_unit', 'sdm_rumpun', 'sdm_sub_rumpun', 'sdm_jenis'], 'default', 'value' => null],
            [['rumpun_unit', 'sdm_rumpun', 'sdm_sub_rumpun', 'sdm_jenis'], 'integer'],
            [['id_nip_nrp', 'penempatan', 'jabatan'], 'string', 'max' => 30],
            [['nota_dinas'], 'string', 'max' => 60],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_nip_nrp' => 'Id Nip Nrp',
            'nota_dinas' => 'Nota Dinas',
            'tanggal' => 'Tanggal',
            'penempatan' => 'Penempatan',
            'dokumen' => 'Dokumen',
            'rumpun_unit' => 'Rumpun Unit',
            'sdm_rumpun' => 'Sdm Rumpun',
            'sdm_sub_rumpun' => 'Sdm Sub Rumpun',
            'sdm_jenis' => 'Sdm Jenis',
            'jabatan' => 'Jabatan',
        ];
    }
}
