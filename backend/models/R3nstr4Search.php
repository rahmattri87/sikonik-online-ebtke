<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\R3nstr4;

/**
 * R3nstr4Search represents the model behind the search form about `backend\models\R3nstr4`.
 */
class R3nstr4Search extends R3nstr4
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_renstra'], 'integer'],
            [['prd_renstra', 'kd_subdir', 'isi_renstra', 'cover_src_filename', 'cover_web_filename', 'file_src_filename', 'file_web_filename', 'id_user', 'wkt_input', 'ip_input'], 'safe'],
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
        $query = R3nstr4::find();

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
            'id_renstra' => $this->id_renstra,
            'wkt_input' => $this->wkt_input,
        ]);

        $query->andFilterWhere(['like', 'prd_renstra', $this->prd_renstra])
            ->andFilterWhere(['like', 'kd_subdir', $this->kd_subdir])
            ->andFilterWhere(['like', 'isi_renstra', $this->isi_renstra])
            ->andFilterWhere(['like', 'cover_src_filename', $this->cover_src_filename])
            ->andFilterWhere(['like', 'cover_web_filename', $this->cover_web_filename])
            ->andFilterWhere(['like', 'file_src_filename', $this->file_src_filename])
            ->andFilterWhere(['like', 'file_web_filename', $this->file_web_filename])
            ->andFilterWhere(['like', 'id_user', $this->id_user])
            ->andFilterWhere(['like', 'ip_input', $this->ip_input]);

        return $dataProvider;
    }
}
