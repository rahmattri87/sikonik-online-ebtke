<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Ind1k4t0r;

/**
 * Ind1k4t0rrSearch represents the model behind the search form about `backend\models\Ind1k4t0r`.
 */
class Ind1k4t0rrSearch extends Ind1k4t0r
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_indikator', 'prd_indikator', 'kd_subdir', 'isi_indikator', 'kriteria_keberhasilan', 'bobot_capaian', 'id_user', 'wkt_input', 'ip_input'], 'safe'],
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
        $query = Ind1k4t0r::find();

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
            'wkt_input' => $this->wkt_input,
        ]);

        $query->andFilterWhere(['like', 'id_indikator', $this->id_indikator])
            ->andFilterWhere(['like', 'prd_indikator', $this->prd_indikator])
            ->andFilterWhere(['like', 'kd_subdir', $this->kd_subdir])
            ->andFilterWhere(['like', 'isi_indikator', $this->isi_indikator])
            ->andFilterWhere(['like', 'kriteria_keberhasilan', $this->kriteria_keberhasilan])
            ->andFilterWhere(['like', 'bobot_capaian', $this->bobot_capaian])
            ->andFilterWhere(['like', 'id_user', $this->id_user])
            ->andFilterWhere(['like', 'ip_input', $this->ip_input]);

        return $dataProvider;
    }
}
