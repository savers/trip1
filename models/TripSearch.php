<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Trip;

/**
 * TripSearch represents the model behind the search form about `app\models\Trip`.
 */
class TripSearch extends Trip
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id','date_otpr', 'iduserdata', 'idclient', 'idproject', 'idusers', 'date_kup_bilet', 'date_pr', 'date_otpr1', 'date_pr1', 'status_trip', 'numbertrip', 'budzhet', 'date_zvit', 'key', 'zhurnal', 'created_at', 'updated_at'], 'integer'],
            [['target', 'vidtransport', 'note'], 'safe'],
            [['daily', 'cena_pr', 'event', 'taxi', 'predstav'], 'number'],

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
        $query = Trip::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=> ['defaultOrder' => ['numbertrip'=>SORT_DESC]]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }


        $query->andFilterWhere([
            'id' => $this->id,
            'iduserdata' => $this->iduserdata,
            'idclient' => $this->idclient,
            'idproject' => $this->idproject,
            'idusers' => $this->idusers,
            'date_kup_bilet' => $this->date_kup_bilet,
            'date_otpr' => $this->date_otpr,
            'date_pr' => $this->date_pr,
            'date_otpr1' => $this->date_otpr1,
            'date_pr1' => $this->date_pr1,
            'status_trip' => $this->status_trip,
            'numbertrip' => $this->numbertrip,
            'daily' => $this->daily,
            'cena_pr' => $this->cena_pr,
            'event' => $this->event,
            'taxi' => $this->taxi,
            'predstav' => $this->predstav,
            'budzhet' => $this->budzhet,
            'date_zvit' => $this->date_zvit,
            'key' => $this->key,
            'zhurnal' => $this->zhurnal,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'target', $this->target])
            ->andFilterWhere(['like', 'vidtransport', $this->vidtransport])
            ->andFilterWhere(['like', 'note', $this->note]);

        return $dataProvider;
    }
}
