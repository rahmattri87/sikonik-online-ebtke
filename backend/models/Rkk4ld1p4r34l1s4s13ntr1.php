<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "rkk4l_d1p4_r34l1s4s1_3ntr1".
 *
 * @property int $id_rkkal_entri
 * @property int $id_rkkal
 * @property string $kd_subdir
 * @property string $thn_anggaran
 * @property string $kegiatan
 * @property string $peserta
 * @property string $lokasi
 * @property string $tanggal
 * @property string $tri_wulan
 * @property string $biaya
 */
class Rkk4ld1p4r34l1s4s13ntr1 extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'rkk4l_d1p4_r34l1s4s1_3ntr1';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_rkkal', 'kd_subdir', 'thn_anggaran', 'kegiatan', 'peserta'], 'required'],
            [['id_rkkal', 'biaya'], 'integer'],
            [['kegiatan', 'peserta'], 'string'],
            [['kd_subdir'], 'string', 'max' => 3],
            [['thn_anggaran'], 'string', 'max' => 15],
            [['lokasi'], 'string', 'max' => 255],
            [['tanggal'], 'string', 'max' => 50],
            [['tri_wulan'], 'string', 'max' => 2],                    
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_rkkal_entri' => 'Id Entri',
            'id_rkkal' => 'Id RKKAL',
            'kd_subdir' => 'Sub Direktorat',
            'thn_anggaran' => 'Tahun Anggaran',
            'kegiatan' => 'Kegiatan',                  
            'peserta' => 'Peserta',
            'lokasi' => 'Lokasi',
            'tanggal' => 'Tanggal',
            'tri_wulan' => 'Tri Wulan',
            'biaya' => 'Biaya',
        ];
    }

    public function GetThnAnggaranNew()
    {
        return substr($this->thn_anggaran, -4, 7); //DKA2017
    }

}
