<?php

namespace backend\models;

use Yii;


/**
 * This is the model class for table "rkk4ld1p4".
 *
 * @property int $id_rkkal
 * @property string $kd_apbn
 * @property string $kd_subdir
 * @property string $thn_anggaran
 * @property string $uraian_kegiatan
 * @property int $volume
 * @property string $satuan
 * @property string $harga_satuan
 * @property string $jumlah
 * @property string $anggaran
 * @property string $file_rkkal
 * @property string $id_user
 * @property string $wkt_input
 * @property string $ip_input
 */
class Rkk4ld1p4_tmp extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        //return 'rkk4ld1p4'; //rkk4ld1p4_tmp
        return 'rkk4ld1p4_tmp'; //rkk4ld1p4
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_rkkal', 'uraian_kegiatan'], 'required'],
            [['id_rkkal', 'volume', 'harga_satuan', 'jumlah', 'anggaran','revisi'], 'integer'],
            [['uraian_kegiatan'], 'string'],
            [['wkt_input'], 'safe'],
            [['kd_apbn', 'file_rkkal', 'ip_input'], 'string', 'max' => 20],
            [['kd_subdir'], 'string', 'max' => 3],
            [['thn_anggaran'], 'string', 'max' => 15],
            [['satuan'], 'string', 'max' => 25],
            [['id_user'], 'string', 'max' => 11],
            [['id_rkkal'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_rkkal' => 'ID RKKAL',
            'kd_apbn' => 'Kode APBN',
            'kd_subdir' => 'Kode Subdir',
            'thn_anggaran' => 'Tahun Anggaran',
            'uraian_kegiatan' => 'Uraian Kegiatan',
            'volume' => 'Volume',
            'satuan' => 'Satuan',
            'harga_satuan' => 'Harga Satuan',
            'jumlah' => 'Jumlah',
            'anggaran' => 'Anggaran',
            'file_rkkal' => 'File RKKAL',
            'id_user' => 'Id User',
            'wkt_input' => 'Waktu Input',
            'ip_input' => 'IP',
            'revisi' => 'revisi',
        ];
    }
}
