<?php

namespace backend\models;
use yii\base\Model;
use backend\models\Subind1k4t0r;
use Yii;

/**
 * This is the model class for table "sub_ind1k4t0r_3ntr1".
 *
 * @property string $id_sub_indikator SIND115190001
 * @property string $id_indikator IND115190001
 * @property int $tri_wulan
 * @property int $capaian
 * @property string $uraian_keberhasilan
 * @property string $kendala
 * @property string $timeline
 * @property int $bobot_nilai
 * @property resource $tahun
 */
class Subind1k4t0r3ntr1 extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sub_ind1k4t0r_3ntr1';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_sub_indikator', 'id_indikator', 'tri_wulan', 'capaian', 'uraian_keberhasilan_entri', 'kendala', 'timeline', 'tahun'], 'required'],
            [['capaian', 'bobot_nilai'], 'integer'],
            [['uraian_keberhasilan_entri','kendala'], 'string'],
            [['id_sub_indikator'], 'string', 'max' => 11],
            [['id_indikator'], 'string', 'max' => 9],
            [['timeline'], 'string', 'max' => 50],
            [['tahun'], 'string', 'max' => 4],
            [['tri_wulan'], 'string', 'max' => 2],            
            [['id_sub_indikator', 'tahun'], 'unique', 'targetAttribute' => ['id_sub_indikator', 'tahun']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_sub_indikator' => 'Sub Indikator',
            'id_indikator' => 'Id Indikator',
            'tri_wulan' => 'Tri Wulan',
            'capaian' => 'Capaian',
            'uraian_keberhasilan_entri' => 'Uraian Keberhasilan entri',
            'kendala' => 'Kendala',
            'timeline' => 'Timeline',
            'bobot_nilai' => 'Bobot Nilai',
            'tahun' => 'Tahun',            
        ];
    }

    public function getSubindikator()
    {
        return $this->hasOne(Subind1k4t0r::ClassName(),['id_sub_indikator'=>'id_sub_indikator']);
    }

    public function getUraian_keberhasilan(){
        return $this->subindikator->uraian_keberhasilan;
    }

    public function getTarget(){
        return $this->subindikator->target;
    }
}
