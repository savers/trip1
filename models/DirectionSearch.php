<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Direction;

/**
 * DirectionSearch represents the model behind the search form about `app\models\Direction`.
 */
class DirectionSearch extends Direction
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['sity'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */


    public static function getTotalBalance($dataProvider, $fieldName){
        $totalBalance = 0;

        foreach ($dataProvider as $item){
            $totalBalance += $item[$fieldName];
        }

        return $totalBalance;
    }




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
        $query = Direction::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=> ['defaultOrder' => ['sity'=>SORT_ASC]]
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
        ]);

        $query->andFilterWhere(['like', 'sity', $this->sity]);

        return $dataProvider;
    }
}
