<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Userdata;

/**
 * UserdataSearch represents the model behind the search form about `app\models\Userdata`.
 */
class UserdataSearch extends Userdata
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_depart', 'status'], 'integer'],
            [['pib', 'position', 'pasport'], 'safe'],
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
        $query = Userdata::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=> ['defaultOrder' => ['pib'=>SORT_ASC]]
        ]);

        $dataProvider->pagination->pageSize=10;

        $this->load($params);


        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'id_depart' => $this->id_depart,
            'status' => $this->status,
                   ]);

        $query->andFilterWhere(['like', 'pib', $this->pib])
            ->andFilterWhere(['like', 'position', $this->position])
            ->andFilterWhere(['like', 'pasport', $this->pasport]);

        return $dataProvider;
    }
}
