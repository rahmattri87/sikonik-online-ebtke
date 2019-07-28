<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Rkk4ld1p4p3n4r1k4n;
use yii\db\Query;

/**
 * Rkk4ld1p4p3n4r1k4nSearch represents the model behind the search form about `backend\models\Rkk4ld1p4p3n4r1k4n`.
 */
class Rkk4ld1p4p3n4r1k4nSearch extends Rkk4ld1p4p3n4r1k4n
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_rkkal', 'anggaran', 'n01', 'n02', 'n03', 'n04', 'n05', 'n06', 'n07', 'n08', 'n09', 'n10', 'n11', 'n12', 'revisi'], 'integer'],
            [['kd_apbn', 'kd_subdir', 'thn_anggaran', 'uraian_kegiatan', 'id_user', 'wkt_input', 'ip_input'], 'safe'],
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
        $query = Rkk4ld1p4p3n4r1k4n::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id_rkkal' => $this->id_rkkal,
            'anggaran' => $this->anggaran,
            'n01' => $this->n01,
            'n02' => $this->n02,
            'n03' => $this->n03,
            'n04' => $this->n04,
            'n05' => $this->n05,
            'n06' => $this->n06,
            'n07' => $this->n07,
            'n08' => $this->n08,
            'n09' => $this->n09,
            'n10' => $this->n10,
            'n11' => $this->n11,
            'n12' => $this->n12,
            'wkt_input' => $this->wkt_input,
            'revisi' => $this->revisi,
        ]);

        $query->andFilterWhere(['like', 'kd_apbn', $this->kd_apbn])
            ->andFilterWhere(['like', 'kd_subdir', $this->kd_subdir])
            ->andFilterWhere(['like', 'thn_anggaran', $this->thn_anggaran])
            ->andFilterWhere(['like', 'uraian_kegiatan', $this->uraian_kegiatan])
            ->andFilterWhere(['like', 'id_user', $this->id_user])
            ->andFilterWhere(['like', 'ip_input', $this->ip_input]);

        return $dataProvider;
    }

    public function _dataProsesRkkal(){
        $connection = \Yii::$app->db;        
        $model = $connection->createCommand('SELECT a.kd_subdir,b.nm_subdir,a.thn_anggaran,a.revisi,COUNT(*) AS jml FROM rkk4l_d1p4_p3n4r1k4n AS a JOIN subd1r3kt0r4t AS b ON a.kd_subdir=b.kd_subdir 
        GROUP BY a.kd_subdir,a.thn_anggaran,a.revisi ORDER BY a.kd_subdir,a.thn_anggaran,a.revisi;')->queryAll();
        return $model;
    }
}
