<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Prikaz;

/**
 * PrikazSearch represents the model behind the search form about `app\models\Prikaz`.
 */
class PrikazSearch extends Prikaz
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'dateprikaz'], 'integer'],
            [['nomberprikaz'], 'safe'],
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
        $query = Prikaz::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=> ['defaultOrder' => ['nomberprikaz'=>SORT_DESC]]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'dateprikaz' => $this->dateprikaz,
        ]);

        $query->andFilterWhere(['like', 'nomberprikaz', $this->nomberprikaz]);

        return $dataProvider;
    }
}
