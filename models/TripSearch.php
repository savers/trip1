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
            [['id','date_otpr', 'iduserdata', 'idclient', 'idproject', 'idusers', 'date_kup_bilet', 'date_pr', 'date_otpr1', 'date_pr1', 'status_trip', 'numbertrip', 'budzhet', 'date_zvit', 'date_zvit_us', 'key', 'zhurnal', 'created_at', 'updated_at'], 'integer'],
            [['target', 'vidtransport', 'note','depart'], 'safe'],
            [['daily', 'cena_pr', 'event', 'taxi', 'predstav','stoimost_pr','dt'], 'number'],

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
    public function search($params,$poisk1,$poisk2)
    {
        $query = Trip::find()->innerJoin('userdata','userdata.id=trip.iduserdata');


        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=> ['defaultOrder' => [
                'dt'=>SORT_DESC,
                'numbertrip'=>SORT_DESC,


            ]]
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
            'stoimost_pr' => $this->stoimost_pr,
            'predstav' => $this->predstav,
            'budzhet' => $this->budzhet,
            'date_zvit' => $this->date_zvit,
            'date_zvit_us' => $this->date_zvit_us,
            'key' => $this->key,
            'zhurnal' => $this->zhurnal,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'userdata.id_depart'=>$this->depart,

        ]);

        if (!$poisk1 and !$poisk2){

            $query->andFilterWhere(['like', 'target', $this->target])
                ->andFilterWhere(['like', 'vidtransport', $this->vidtransport])
                ->andFilterWhere(['like', 'note', $this->note]);

        }
        else
        {

            $poisk1 = \DateTime::createFromFormat('d.m.Y',$poisk1);
            $poisk1 = $poisk1->format('U');
            $poisk2 = \DateTime::createFromFormat('d.m.Y',$poisk2);
            $poisk2 = $poisk2->format('U');

            $query->andFilterWhere(['like', 'target',$this->target])
                ->andFilterWhere(['like', 'vidtransport', $this->vidtransport])
                ->andFilterWhere(['like', 'note', $this->note])
                ->andFilterWhere(['>=','date_otpr',$poisk1])
                ->andFilterWhere(['<=','date_otpr',$poisk2]);
               // ->addFilterWhere(['<','date_otpr', $poisk2]);


        }


        return $dataProvider;
    }
}
