<?php

namespace app\models;

use Faker\Provider\DateTime;
use Yii;
use yii\behaviors\TimestampBehavior;


/**
 * This is the model class for table "trip".
 *
 * @property integer $id
 * @property integer $iduserdata
 * @property integer $idclient
 * @property integer $idproject
 * @property integer $idusers
 * @property integer $date_kup_bilet
 * @property integer $date_otpr
 * @property integer $date_pr
 * @property integer $date_otpr1
 * @property integer $date_pr1
 * @property integer $status_trip
 * @property integer $numbertrip
 * @property string $target
 * @property double $daily
 * @property string $vidtransport
 * @property double $cena_pr
 * @property double $event
 * @property double $taxi
 * @property double $predstav
 * @property integer $budzhet
 * @property integer $date_zvit
 * @property integer $key
 * @property integer $zhurnal
 * @property string $note
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property Client $idclient0
 * @property Project $idproject0
 * @property Userdata $iduserdata0
 * @property Users $idusers0
 */
class Trip extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'trip';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['iduserdata','date_otpr','date_otpr1','date_pr','date_pr1', 'idclient', 'idproject',   'status_trip', 'numbertrip', 'target', 'daily', 'vidtransport', 'cena_pr', 'event', 'taxi', 'predstav', 'budzhet', 'date_zvit', 'key', 'zhurnal','date_kup_bilet' ], 'required'],
            [['iduserdata', 'idclient', 'idproject', 'idusers', 'status_trip', 'numbertrip', 'budzhet',  'key', 'zhurnal', 'created_at', 'updated_at'], 'integer'],
            [['daily', 'cena_pr', 'event', 'taxi', 'predstav'], 'number'],
            [['target', 'vidtransport', 'note'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'iduserdata' => 'Iduserdata',
            'idclient' => 'Idclient',
            'idproject' => 'Idproject',
            'idusers' => 'Idusers',
            'date_kup_bilet' => 'Date Kup Bilet',
            'date_otpr' => 'Date Otpr',
            'date_pr' => 'Date Pr',
            'date_otpr1' => 'Date Otpr1',
            'date_pr1' => 'Date Pr1',
            'status_trip' => 'Status Trip',
            'numbertrip' => 'Numbertrip',
            'target' => 'Target',
            'daily' => 'Daily',
            'vidtransport' => 'Vidtransport',
            'cena_pr' => 'Cena Pr',
            'event' => 'Event',
            'taxi' => 'Taxi',
            'predstav' => 'Predstav',
            'budzhet' => 'Budzhet',
            'date_zvit' => 'Date Zvit',
            'key' => 'Key',
            'zhurnal' => 'Zhurnal',
            'note' => 'Note',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }


    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if ($this->isNewRecord) {

                $this->idusers = Yii::$app->user->id;


                $this->date_kup_bilet = \DateTime::createFromFormat('Y-m-d H:i',$this->date_kup_bilet)->format('U');
                $this->date_otpr = \DateTime::createFromFormat('Y-m-d H:i',$this->date_otpr)->format('U');
                $this->date_otpr1 = \DateTime::createFromFormat('Y-m-d H:i',$this->date_otpr1)->format('U');
                $this->date_pr = \DateTime::createFromFormat('Y-m-d H:i',$this->date_pr)->format('U');
                $this->date_pr1 = \DateTime::createFromFormat('Y-m-d H:i',$this->date_pr1)->format('U');
                $this->date_zvit = \DateTime::createFromFormat('Y-m-d H:i',$this->date_zvit)->format('U');


            }
            return true;
        }
        return false;
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdclient0()
    {
        return $this->hasOne(Client::className(), ['id' => 'idclient']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdproject0()
    {
        return $this->hasOne(Project::className(), ['id' => 'idproject']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIduserdata0()
    {
        return $this->hasOne(Userdata::className(), ['id' => 'iduserdata']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdusers0()
    {
        return $this->hasOne(Users::className(), ['id' => 'idusers']);
    }
}
