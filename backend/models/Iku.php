<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "iku".
 *
 * @property int $id_iku
 * @property string $kd_subdir
 * @property string $nm_dokumen
 * @property string $upload_src_filename
 * @property string $upload_web_filename
 * @property string $id_user
 * @property string $wkt_input
 * @property string $ip_input
 */
class Iku extends \yii\db\ActiveRecord
{
    const PERMISSIONS_PRIVATE = 10;
    const PERMISSIONS_PUBLIC = 20;  
    public $image;
    public $pdf;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'iku';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['wkt_input'], 'safe'],
            [['kd_subdir'], 'string', 'max' => 10],

            [['pdf'], 'safe'],
            [['pdf'], 'file', 'extensions'=>'pdf'],
            [['pdf'], 'file', 'maxSize'=>'100000', 'skipOnEmpty' => true],

            [['nm_dokumen', 'upload_src_filename', 'upload_web_filename'], 'string', 'max' => 255],
            [['id_user'], 'string', 'max' => 50],
            [['ip_input'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_iku' => 'Id Iku',
            'kd_subdir' => 'Kd Subdir',
            'nm_dokumen' => 'Nm Dokumen',
            'upload_src_filename' => 'Upload Src Filename',
            'upload_web_filename' => 'Upload Web Filename',
            'id_user' => 'User',
            'wkt_input' => 'Wkt Input',
            'ip_input' => 'Ip Input',
            'pdf' => 'Dokumen pdf IKU',
        ];
    }
}
