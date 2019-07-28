<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Subind1k4t0r3ntr1;

/**
 * Subind1k4t0r3ntr1Search represents the model behind the search form about `backend\models\Subind1k4t0r3ntr1`.
 */
class Subind1k4t0r3ntr1Search extends Subind1k4t0r3ntr1
{
    public $uraian_keberhasilan;
    public $target;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_sub_indikator', 'id_indikator', 'uraian_keberhasilan_entri', 'kendala', 'timeline', 'tahun','uraian_keberhasilan','target'], 'safe'],
            [['tri_wulan', 'capaian', 'bobot_nilai'], 'integer'],
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
        $query = Subind1k4t0r3ntr1::find();
        $query -> joinWith(['subindikator']);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->sort->attributes['uraian_keberhasilan'] = [
            'asc'=>['uraian_keberhasilan'=>SORT_ASC],
            'desc'=>['uraian_keberhasilan'=>SORT_DESC],
        ];

        $dataProvider->sort->attributes['target'] = [
            'asc'=>['target'=>SORT_ASC],
            'desc'=>['target'=>SORT_DESC],
        ];

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'tri_wulan' => $this->tri_wulan,
            'capaian' => $this->capaian,
            'bobot_nilai' => $this->bobot_nilai,
        ]);

        $query->andFilterWhere(['like', 'id_sub_indikator', $this->id_sub_indikator])
            ->andFilterWhere(['like', 'id_indikator', $this->id_indikator])
            ->andFilterWhere(['like', 'uraian_keberhasilan_entri', $this->uraian_keberhasilan_entri])
            ->andFilterWhere(['like', 'kendala', $this->kendala])
            ->andFilterWhere(['like', 'timeline', $this->timeline])
            ->andFilterWhere(['like', 'tahun', $this->tahun])
            ->andFilterWhere(['like', 'uraian_keberhasilan', $this->uraian_keberhasilan])
            ->andFilterWhere(['like', 'target', $this->target]);

        return $dataProvider;
    }
}
