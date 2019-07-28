<?php

namespace backend\models;
use yii\base\Model;
use Yii;

/**
 * This is the model class for table "sub_ind1k4t0r".
 *
 * @property string $id_sub_indikator SIND115190001
 * @property string $id_indikator IND115190001
 * @property string $uraian_keberhasilan
 * @property int $target
 */
class Subind1k4t0r extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sub_ind1k4t0r';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_sub_indikator', 'id_indikator', 'uraian_keberhasilan'], 'required'],
            [['uraian_keberhasilan'], 'string'],
            [['target'], 'integer'],
            [['id_sub_indikator'], 'string', 'max' => 11],
            [['id_indikator'], 'string', 'max' => 9],
            [['id_sub_indikator'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_sub_indikator' => 'Id Sub Indikator',
            'id_indikator' => 'Id Indikator',
            'uraian_keberhasilan' => 'Uraian Keberhasilan',
            'target' => 'Target',
        ];
    }

    public function getIndikator()
    {
        return $this->hasOne(Ind1k4t0r::ClassName(),['id_indikator'=>'id_indikator']);
    }

    public function getIsi_indikator(){
        return $this->indikator->isi_indikator;
    }

    public function getBobot_capaian(){
        return $this->indikator->bobot_capaian;
    }
}
