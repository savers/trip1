<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "prikaz".
 *
 * @property integer $id
 * @property string $nomberprikaz
 * @property integer $dateprikaz
 *
 * @property Trip[] $trips
 */
class Prikaz extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'prikaz';
    }


    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if ($this->isNewRecord) {

               $this->dateprikaz = \DateTime::createFromFormat('Y-m-d H:i',$this->dateprikaz)->format('U');

            }
            return true;
        }
        return false;
    }



    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nomberprikaz', 'dateprikaz'], 'required'],
            [['nomberprikaz'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nomberprikaz' => 'Номер приказа',
            'dateprikaz' => 'Дата приказа',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTrips()
    {
        return $this->hasMany(Trip::className(), ['idpr' => 'id']);
    }
}
