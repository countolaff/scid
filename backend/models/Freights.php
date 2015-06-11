<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "freights".
 *
 * @property integer $id
 * @property integer $idUser
 * @property string $name
 * @property string $telephone
 * @property string $Observations
 * @property string $created_at
 * @property integer $state
 */
class Freights extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'freights';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            //[['id', 'idUser'], 'required'],
            [['id', 'idUser', 'state'], 'integer'],
            [['created_at'], 'safe'],
            [['name', 'Observations'], 'string', 'max' => 45],
            [['telephone'], 'string', 'max' => 15],
            [['id'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'Id'),
            'idUser' => Yii::t('app', 'Id User'),
            'name' => Yii::t('app', 'Name'),
            'telephone' => Yii::t('app', 'Telephone'),
            'Observations' => Yii::t('app', 'Observations'),
            'created_at' => Yii::t('app', 'Created At'),
            'state' => Yii::t('app', 'State'),
        ];
    }

    /**
     * @inheritdoc
     * @return FreightsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new FreightsQuery(get_called_class());
    }
}
