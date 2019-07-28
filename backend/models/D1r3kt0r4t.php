<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "d1r3kt0r4t".
 *
 * @property string $kd_direktorat
 * @property string $nm_direktorat
 */
class D1r3kt0r4t extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'd1r3kt0r4t';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kd_direktorat', 'nm_direktorat'], 'required'],
            [['kd_direktorat'], 'string', 'max' => 5],
            [['nm_direktorat'], 'string', 'max' => 50],
            [['kd_direktorat'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'kd_direktorat' => 'Kode',
            'nm_direktorat' => 'Nama Direktorat',
        ];
    }
}
