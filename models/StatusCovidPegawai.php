<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pegawai.tb_status_covid_pegawai".
 *
 * @property int $id_status_covid
 * @property int $id_pegawai
 * @property int|null $pernah_positif_covid
 * @property int|null $pernah_vaksin
 */
class StatusCovidPegawai extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pegawai.tb_status_covid_pegawai';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_pegawai'], 'required'],
            [['id_pegawai', 'pernah_positif_covid', 'pernah_vaksin'], 'default', 'value' => null],
            [['id_pegawai', 'pernah_positif_covid', 'pernah_vaksin'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_status_covid' => 'Id Status Covid',
            'id_pegawai' => 'Id Pegawai',
            'pernah_positif_covid' => 'Pernah Positif Covid',
            'pernah_vaksin' => 'Pernah Vaksin',
        ];
    }
}
