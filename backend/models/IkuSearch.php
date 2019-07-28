<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Iku;

/**
 * IkuSearch represents the model behind the search form about `backend\models\Iku`.
 */
class IkuSearch extends Iku
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_iku'], 'integer'],
            [['kd_subdir', 'nm_dokumen', 'upload_src_filename', 'upload_web_filename', 'id_user', 'wkt_input', 'ip_input'], 'safe'],
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
        $query = Iku::find();

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
            'id_iku' => $this->id_iku,
            'wkt_input' => $this->wkt_input,
        ]);

        $query->andFilterWhere(['like', 'kd_subdir', $this->kd_subdir])
            ->andFilterWhere(['like', 'nm_dokumen', $this->nm_dokumen])
            ->andFilterWhere(['like', 'upload_src_filename', $this->upload_src_filename])
            ->andFilterWhere(['like', 'upload_web_filename', $this->upload_web_filename])
            ->andFilterWhere(['like', 'id_user', $this->id_user])
            ->andFilterWhere(['like', 'ip_input', $this->ip_input]);

        return $dataProvider;
    }
}
