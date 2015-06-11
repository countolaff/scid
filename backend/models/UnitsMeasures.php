<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "units_measures".
 *
 * @property integer $idUnit
 * @property integer $idUser
 * @property string $name
 * @property string $description
 * @property string $initialDate
 * @property string $modifyDate
 * @property integer $state
 * @property integer $math
 */
class UnitsMeasures extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'units_measures';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            //[['idUnit'], 'required'],
            [['idUnit', 'idUser', 'state', 'math'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['name'], 'string', 'max' => 45],
            [['description'], 'string', 'max' => 200],
            [['idUnit'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idUnit' => Yii::t('backend', 'Id Unit'),
            'idUser' => Yii::t('backend', 'Id User'),
            'name' => Yii::t('backend', 'Name'),
            'description' => Yii::t('backend', 'Description'),
            'created_at' => Yii::t('backend', 'Created_at'),
            'updated_at' => Yii::t('backend', 'Updated_at'),
            'state' => Yii::t('backend', 'State'),
            'math' => Yii::t('backend', 'Math'),
        ];
    }

    /**
     * @inheritdoc
     * @return UnitsMeasuresQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UnitsMeasuresQuery(get_called_class());
    }
}
