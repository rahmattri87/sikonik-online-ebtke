<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Rkk4ld1p4_tmp;
use yii\db\Query;

/**
 * Rkk4ld1p4Search represents the model behind the search form about `backend\models\Rkk4ld1p4_tmp`.
 */
class Rkk4ld1p4Search_tmp extends Rkk4ld1p4_tmp
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_rkkal', 'volume', 'harga_satuan', 'jumlah', 'anggaran','revisi'], 'integer'],
            [['kd_apbn', 'kd_subdir', 'thn_anggaran', 'uraian_kegiatan', 'satuan', 'file_rkkal', 'id_user', 'wkt_input', 'ip_input'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Rkk4ld1p4_tmp::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,           
            'sort' => [
                'defaultOrder' => [
                    'id_rkkal' => SORT_ASC,                    
                ]
            ],            
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id_rkkal' => $this->id_rkkal,
            'volume' => $this->volume,
            'harga_satuan' => $this->harga_satuan,
            'jumlah' => $this->jumlah,
            'anggaran' => $this->anggaran,
            'wkt_input' => $this->wkt_input,
            'revisi' => $this->revisi,            
        ]);

        $query->andFilterWhere(['like', 'kd_apbn', $this->kd_apbn])
            ->andFilterWhere(['like', 'kd_subdir', $this->kd_subdir])
            ->andFilterWhere(['like', 'thn_anggaran', $this->thn_anggaran])
            ->andFilterWhere(['like', 'uraian_kegiatan', $this->uraian_kegiatan])
            ->andFilterWhere(['like', 'satuan', $this->satuan])
            ->andFilterWhere(['like', 'file_rkkal', $this->file_rkkal])
            ->andFilterWhere(['like', 'id_user', $this->id_user])
            ->andFilterWhere(['like', 'ip_input', $this->ip_input])
            ->andFilterWhere(['like', 'revisi', $this->revisi]);

        return $dataProvider;
    }

    public function _truncateExcel(){
        $connection = \Yii::$app->db;        
        $model = $connection->createCommand('truncate rkk4ld1p4_tmp;')->query();
    }

    public function _transferExcel(){
        $connection = \Yii::$app->db;        
        $q=$connection->createCommand('SELECT revisi FROM rkk4ld1p4_tmp group by revisi;')->queryColumn();
        if($q[0]=='0'||$q[0]==''){
            $model = $connection->createCommand('REPLACE INTO rkk4ld1p4 SELECT * FROM rkk4ld1p4_tmp;')->query();            
            $model = $connection->createCommand('truncate rkk4ld1p4_tmp;')->query();        
        }else{
            $model = $connection->createCommand('REPLACE INTO rkk4l_d1p4_h1st0ry SELECT * FROM rkk4ld1p4_tmp;')->query();            
            $model = $connection->createCommand('truncate rkk4ld1p4_tmp;')->query();        
        }
        
    }

    public function actionTransferExcelRevisi(){
        $connection = \Yii::$app->db;        
        $model = $connection->createCommand('REPLACE INTO rkk4l_d1p4_h1st0ry SELECT * FROM rkk4ld1p4_tmp;')->query();
        $model = $connection->createCommand('truncate rkk4ld1p4_tmp;')->query();
    }

    
}
