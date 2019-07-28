<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "ind1k4t0r".
 *
 * @property string $id_indikator
 * @property string $prd_indikator
 * @property string $kd_subdir DKA, DKE, DKK,DKP,DKT
 * @property string $isi_indikator Rencana Aksi
 * @property string $kriteria_keberhasilan
 * @property string $bobot_capaian
 * @property string $id_user
 * @property string $wkt_input
 * @property string $ip_input
 */
class Ind1k4t0r extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ind1k4t0r';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_indikator', 'prd_indikator', 'kd_subdir', 'isi_indikator', 'kriteria_keberhasilan', 'bobot_capaian', 'id_user', 'ip_input'], 'required'],
            [['isi_indikator'], 'string'],
            [['wkt_input'], 'safe'],
            [['id_indikator'], 'string', 'max' => 9],
            [['prd_indikator'], 'string', 'max' => 4],
            [['kd_subdir'], 'string', 'max' => 3],
            [['kriteria_keberhasilan', 'bobot_capaian'], 'string', 'max' => 50],
            [['id_user'], 'string', 'max' => 50],
            [['ip_input'], 'string', 'max' => 20],
            [['id_indikator'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_indikator' => 'Id Indikator',
            'prd_indikator' => 'Prd Indikator',
            'kd_subdir' => 'Kd Subdir',
            'isi_indikator' => 'Isi Indikator',
            'kriteria_keberhasilan' => 'Kriteria Keberhasilan',
            'bobot_capaian' => 'Bobot Capaian',
            'id_user' => 'Id User',
            'wkt_input' => 'Wkt Input',
            'ip_input' => 'Ip Input',
        ];
    }
}
