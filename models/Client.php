<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "client".
 *
 * @property integer $id
 * @property integer $iddirection
 * @property string $nameclient
 *
 * @property Direction $iddirection0
 */
class Client extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'client';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['iddirection'], 'integer'],
            [['nameclient'], 'required'],
            [['nameclient'], 'string', 'max' => 255],
            ['namevid', 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'iddirection' => 'Направление',
            'nameclient' => 'Наименование клиента',
            'namevid' => 'Форма собственности',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDirections()
    {
        return $this->hasOne(Direction::className(), ['id' => 'iddirection']);
    }
}
