<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\D1r3kt0r4t;

/**
 * D1r3kt0r4tSearch represents the model behind the search form about `backend\models\D1r3kt0r4t`.
 */
class D1r3kt0r4tSearch extends D1r3kt0r4t
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kd_direktorat', 'nm_direktorat'], 'safe'],
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
        $query = D1r3kt0r4t::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere(['like', 'kd_direktorat', $this->kd_direktorat])
            ->andFilterWhere(['like', 'nm_direktorat', $this->nm_direktorat]);

        return $dataProvider;
    }
}
