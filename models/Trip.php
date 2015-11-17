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

    public $test;
    public $test1;
    public $ssilka;
    public $poisk1;
    public $poisk2;
    public $depart;

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
            [['idotpr','idpr','iduserdata','date_otpr','date_otpr1','date_pr','date_pr1', 'idclient', 'idproject',   'status_trip', 'numbertrip', 'target', 'daily', 'vidtransport', 'cena_pr', 'event', 'taxi', 'predstav', 'budzhet', 'key', 'zhurnal','date_kup_bilet'  ], 'required'],
            [['iduserdata', 'idclient', 'idproject', 'idusers', 'status_trip', 'numbertrip', 'budzhet',  'key', 'zhurnal', 'created_at', 'updated_at'], 'integer'],
            [['daily', 'cena_pr', 'event', 'taxi', 'predstav'], 'number'],
            ['date_zvit', 'safe'],
            [['poisk1','target', 'vidtransport', 'note'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'iduserdata' => 'Фамилия Имя Отчество',
            'idclient' => 'Клиент',
            'idproject' => 'Проект',
            'idusers' => 'Регистратор',
            'date_kup_bilet' => 'Дата покупки билетов',
            'date_otpr' => 'Дата отправления в пункт назначения',
            'date_pr' => 'Дата прибытия в пункт назначения',
            'date_otpr1' => 'Дата отправления из пункта назначения',
            'date_pr1' => 'Дата прибытия назад',
            'status_trip' => 'Официальная командировка или нет',
            'numbertrip' => 'Номер командировки',
            'target' => 'Цель поездки / номер договора',
            'daily' => 'Суточные',
            'vidtransport' => 'Вид транспорта',
            'cena_pr' => 'Стоимость проезда в обе стороны',
            'event' => 'Цена участия',
            'taxi' => 'Такси',
            'predstav' => 'Представительские',
            'budzhet' => 'Привязка к бюджету по маркетингу',
            'date_zvit' => 'Дата подачи отчета в бухгалтерию',
            'key' => 'Необходимость ключа',
            'zhurnal' => 'Внесение в журнал командировок',
            'note' => 'Примечание',
            'created_at' => 'Создано',
            'updated_at' => 'Обновлено',
            'test'=>'Направление',
            'idpr'=>'Номер приказа',
            'idotpr'=>'Город отправления',
            'depart'=>'Департамент',

        ];
    }





    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {


                $this->idusers = Yii::$app->user->id;


                $this->date_kup_bilet = \DateTime::createFromFormat('Y-m-d H:i',$this->date_kup_bilet)->format('U');
                $this->date_otpr = \DateTime::createFromFormat('Y-m-d H:i',$this->date_otpr)->format('U');
                $this->date_otpr1 = \DateTime::createFromFormat('Y-m-d H:i',$this->date_otpr1)->format('U');
                $this->date_pr = \DateTime::createFromFormat('Y-m-d H:i',$this->date_pr)->format('U');
                $this->date_pr1 = \DateTime::createFromFormat('Y-m-d H:i',$this->date_pr1)->format('U');


            if ($this->date_zvit !== '') {
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
    public function getClient1()
    {
        return $this->hasOne(Client::className(), ['id' => 'idclient']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProject1()
    {
        return $this->hasOne(Project::className(), ['id' => 'idproject']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserdata1()
    {
        return $this->hasOne(Userdata::className(), ['id' => 'iduserdata']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers1()
    {
        return $this->hasOne(Users::className(), ['id' => 'idusers']);
    }

    public function getPrikaz1()
    {
        return $this->hasOne(Prikaz::className(), ['id' => 'idpr']);
    }

}
