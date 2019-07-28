<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "rkk4l_d1p4_p3n4r1k4n".
 *
 * @property int $id_rkkal
 * @property string $kd_apbn
 * @property string $kd_subdir
 * @property string $thn_anggaran
 * @property string $uraian_kegiatan
 * @property string $anggaran
 * @property string $01
 * @property string $02
 * @property string $03
 * @property string $04
 * @property string $05
 * @property string $06
 * @property string $07
 * @property string $08
 * @property string $09
 * @property string $10
 * @property string $11
 * @property string $12
 * @property string $id_user
 * @property string $wkt_input
 * @property string $ip_input
 * @property int $revisi
 */
class Rkk4ld1p4p3n4r1k4n extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'rkk4l_d1p4_p3n4r1k4n';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_rkkal', 'kd_subdir', 'thn_anggaran', 'uraian_kegiatan', 'anggaran', 'n01', 'n02', 'n03', 'n04', 'n05', 'n06', 'n07', 'n08', 'n09', 'n10', 'n11', 'n12', 'id_user', 'wkt_input'], 'required'],
            [['id_rkkal', 'anggaran', 'n01', 'n02', 'n03', 'n04', 'n05', 'n06', 'n07', 'n08', 'n09', 'n10', 'n11', 'n12', 'revisi'], 'integer'],
            [['uraian_kegiatan'], 'string'],
            [['wkt_input'], 'safe'],
            [['kd_apbn', 'ip_input'], 'string', 'max' => 20],
            [['kd_subdir'], 'string', 'max' => 3],
            [['thn_anggaran'], 'string', 'max' => 15],
            [['id_user'], 'string', 'max' => 11],
            [['id_rkkal', 'kd_subdir', 'thn_anggaran'], 'unique', 'targetAttribute' => ['id_rkkal', 'kd_subdir', 'thn_anggaran']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_rkkal' => 'Id Rkkal',
            'kd_apbn' => 'Kd Apbn',
            'kd_subdir' => 'Kd Subdir',
            'thn_anggaran' => 'Thn Anggaran',
            'uraian_kegiatan' => 'Uraian Kegiatan',
            'anggaran' => 'Anggaran',
            'n01' => 'n01',
            'n02' => 'n02',
            'n03' => 'n03',
            'n04' => 'n04',
            'n05' => 'n05',
            'n06' => 'n06',
            'n07' => 'n07',
            'n08' => 'n08',
            'n09' => 'n09',
            'n10' => 'n10',
            'n11' => 'n11',
            'n12' => 'n12',
            'id_user' => 'Id User',
            'wkt_input' => 'Wkt Input',
            'ip_input' => 'Ip Input',
            'revisi' => 'Revisi',
        ];
    }
    
}
