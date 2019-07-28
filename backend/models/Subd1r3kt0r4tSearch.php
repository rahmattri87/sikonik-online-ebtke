<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Subd1r3kt0r4t;

/**
 * Subd1r3kt0r4tSearch represents the model behind the search form about `backend\models\Subd1r3kt0r4t`.
 */
class Subd1r3kt0r4tSearch extends Subd1r3kt0r4t
{
    public $nm_direktorat;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kd_subdir', 'nm_subdir', 'kd_direktorat','nm_direktorat'], 'safe'],
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
        $query = Subd1r3kt0r4t::find();
        $query -> joinWith(['direktorat']);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=> ['defaultOrder' => ['nm_direktorat'=>SORT_ASC,'kd_subdir'=>SORT_ASC]]
        ]);

        $dataProvider->sort->attributes['nm_direktorat'] = [
            'asc'=>['nm_direktorat'=>SORT_ASC],
            'desc'=>['nm_direktorat'=>SORT_DESC],
        ];
        
        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere(['like', 'kd_subdir', $this->kd_subdir])
              ->andFilterWhere(['like', 'nm_subdir', $this->nm_subdir])
              ->andFilterWhere(['like', 'nm_direktorat', $this->nm_direktorat]);

        return $dataProvider;
    }
}
