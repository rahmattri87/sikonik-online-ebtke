<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "r3nstr4".
 *
 * @property int $id_renstra REN15190001
 * @property string $prd_renstra 2015-2019
 * @property string $kd_subdir DKA, DKE, DKK,DKP,DKT
 * @property string $isi_renstra
 * @property string $cover_src_filename
 * @property string $cover_web_filename
 * @property string $file_src_filename
 * @property string $file_web_filename
 * @property string $id_user
 * @property string $wkt_input
 * @property string $ip_input
 */
class R3nstr4 extends \yii\db\ActiveRecord
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
        return 'r3nstr4';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['isi_renstra'], 'required'],
            [['isi_renstra'], 'string'],
            [['wkt_input'], 'safe'],
            [['prd_renstra'], 'string', 'max' => 11],
            [['id_user'], 'string', 'max' => 50],
            [['kd_subdir'], 'string', 'max' => 10],
            
            [['image'], 'safe'],
            [['image'], 'file', 'extensions'=>'jpg, gif, png'],
            [['image'], 'file', 'maxSize'=>'100000', 'skipOnEmpty' => true],
            
            [['pdf'], 'safe'],
            [['pdf'], 'file', 'extensions'=>'pdf'],
            [['pdf'], 'file', 'maxSize'=>'100000', 'skipOnEmpty' => true],

            [['cover_src_filename', 'cover_web_filename', 'file_src_filename', 'file_web_filename'], 'string', 'max' => 255],
            [['ip_input'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_renstra' => 'ID Renstra',
            'prd_renstra' => 'Periode Renstra',
            'kd_subdir' => 'Direktorat',
            'isi_renstra' => 'Isi Renstra',
            'cover_src_filename' => 'Cover Src Filename',
            'cover_web_filename' => 'Cover Web Filename',
            'file_src_filename' => 'File Src Filename',
            'file_web_filename' => 'File Web Filename',
            'id_user' => 'User',
            'wkt_input' => 'Waktu Input',
            'ip_input' => 'Ip Input',
            'image' => 'Cover Renstra',
            'pdf' => 'File pdf Renstra',
        ];
    }
    
}
