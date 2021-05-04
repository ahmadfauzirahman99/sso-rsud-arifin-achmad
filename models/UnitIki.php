<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pegawai.tb_set_unit_iki".
 *
 * @property int $id
 * @property int $kode_unit
 * @property int $tanggal_locked
 */
class UnitIki extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pegawai.tb_set_unit_iki';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kode_unit', 'tanggal_locked'], 'required'],
            [['kode_unit', 'tanggal_locked'], 'default', 'value' => null],
            [['kode_unit', 'tanggal_locked'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'kode_unit' => 'Kode Unit',
            'tanggal_locked' => 'Tanggal Locked',
        ];
    }
}
