<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "direction".
 *
 * @property integer $id
 * @property string $sity
 *
 * @property Client[] $clients
 */
class Direction extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'direction';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sity'], 'required'],
            [['sity'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'sity' => 'Грод',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClients()
    {
        return $this->hasMany(Client::className(), ['iddirection' => 'id']);
    }
}
