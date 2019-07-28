<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Rkk4ld1p4r34l1s4s13ntr1;

/**
 * Rkk4ld1p4r34l1s4s13ntr1Search represents the model behind the search form about `backend\models\Rkk4ld1p4r34l1s4s13ntr1`.
 */
class Rkk4ld1p4r34l1s4s13ntr1Search extends Rkk4ld1p4r34l1s4s13ntr1
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_rkkal_entri', 'id_rkkal', 'biaya'], 'integer'],
            [['kd_subdir', 'thn_anggaran', 'kegiatan', 'peserta', 'lokasi', 'tanggal', 'tri_wulan'], 'safe'],
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
        $query = Rkk4ld1p4r34l1s4s13ntr1::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=> ['defaultOrder' => ['kd_subdir'=>SORT_ASC,'thn_anggaran'=>SORT_ASC,'id_rkkal'=>SORT_ASC]]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id_rkkal_entri' => $this->id_rkkal_entri,
            'id_rkkal' => $this->id_rkkal,
            'biaya' => $this->biaya,
        ]);

        $query->andFilterWhere(['like', 'kd_subdir', $this->kd_subdir])
            ->andFilterWhere(['like', 'thn_anggaran', $this->thn_anggaran])
            ->andFilterWhere(['like', 'kegiatan', $this->kegiatan])
            ->andFilterWhere(['like', 'peserta', $this->peserta])
            ->andFilterWhere(['like', 'lokasi', $this->lokasi])
            ->andFilterWhere(['like', 'tanggal', $this->tanggal])
            ->andFilterWhere(['like', 'tri_wulan', $this->tri_wulan]);

        return $dataProvider;
    }
}
