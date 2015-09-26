<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "depart".
 *
 * @property integer $id
 * @property string $name_depart
 *
 * @property UserData[] $userDatas
 */
class Depart extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'depart';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name_depart'], 'required'],
            [['name_depart'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID Департамента',
            'name_depart' => 'Наименование департамента',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserDatas()
    {
        return $this->hasMany(UserData::className(), ['id_depart' => 'id']);
    }
}
