<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "userdata".
 *
 * @property integer $id
 * @property integer $id_depart
 * @property string $pib
 * @property string $position
 * @property string $pasport
 * @property integer $status
 *
 * @property Depart $idDepart
 */
class Userdata extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'userdata';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_depart', 'status'], 'integer'],
            [['pib', 'position', 'pasport'], 'required'],
            [['pib', 'position', 'pasport'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID Сотрудника',
            'id_depart' => 'Id Департамента',
            'pib' => 'Ф И О',
            'position' => 'Должность',
            'pasport' => 'Паспорт',
            'status' => 'Статус',


        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdDepart()
    {
        return $this->hasOne(Depart::className(), ['id' => 'id_depart']);
    }



}
