<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Subind1k4t0r;

/**
 * Subind1k4t0rSearch represents the model behind the search form about `backend\models\Subind1k4t0r`.
 */
class Subind1k4t0rSearch extends Subind1k4t0r
{
    public $isi_indikator;
    public $bobot_capaian;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_sub_indikator', 'id_indikator', 'uraian_keberhasilan','isi_indikator','bobot_capaian'], 'safe'],
            [['target'], 'integer'],
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
        $query = Subind1k4t0r::find();
        $query -> joinWith(['indikator']);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->sort->attributes['isi_indikator'] = [
            'asc'=>['isi_indikator'=>SORT_ASC],
            'desc'=>['isi_indikator'=>SORT_DESC],
        ];

        $dataProvider->sort->attributes['bobot_capaian'] = [
            'asc'=>['bobot_capaian'=>SORT_ASC],
            'desc'=>['bobot_capaian'=>SORT_DESC],
        ];

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'target' => $this->target,
        ]);

        $query->andFilterWhere(['like', 'id_sub_indikator', $this->id_sub_indikator])
            ->andFilterWhere(['like', 'id_indikator', $this->id_indikator])
            ->andFilterWhere(['like', 'uraian_keberhasilan', $this->uraian_keberhasilan])
            ->andFilterWhere(['like', 'isi_indikator', $this->isi_indikator])
            ->andFilterWhere(['like', 'bobot_capaian', $this->bobot_capaian]);

        return $dataProvider;
    }
}
