<?php

namespace backend\models;
use yii\base\Model;
use backend\models\D1r3kt0r4t;
use backend\models\Subd1r3kt0r4tSearch;

use Yii;

/**
 * This is the model class for table "subd1r3kt0r4t".
 *
 * @property string $kd_subdir DKA, DKE, DKK,DKP,DKT
 * @property string $nm_subdir
 * @property string $kd_direktorat
 */
class Subd1r3kt0r4t extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'subd1r3kt0r4t';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kd_subdir', 'nm_subdir', 'kd_direktorat'], 'required'],
            [['kd_subdir'], 'string', 'max' => 3],
            [['nm_subdir'], 'string', 'max' => 50],
            [['kd_direktorat'], 'string', 'max' => 7],
            [['kd_subdir'], 'unique'],
            //[['nm_direktorat'],'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'kd_subdir' => 'Kode Sub Direktorat',
            'nm_subdir' => 'Nama Sub Direktorat',
            'kd_direktorat' => 'Direktorat',
            //'nm_direktorat' => 'Nama Direktorat',
        ];
    }

    public function getDirektorat()
    {
        return $this->hasOne(D1r3kt0r4t::ClassName(),['kd_direktorat'=>'kd_direktorat']);
    }

    public function getNm_direktorat(){
        return $this->direktorat->nm_direktorat;
    }

}
