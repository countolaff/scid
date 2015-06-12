<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "parameters".
 *
 * @property integer $idParameter
 * @property integer $idUser
 * @property string $name
 * @property string $description
 * @property string $created_at
 * @property string $updated_at
 * @property integer $state
 * @property string $parameterCode
 */
class Parameters extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'parameters';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            //[['idParameter'], 'required'],
            [['idParameter', 'idUser', 'state'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'parameterCode'], 'string', 'max' => 45],
            [['description','value'], 'string', 'max' => 200],
            [['idParameter'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idParameter' => Yii::t('backend', 'Id Parameter'),
            'idUser' => Yii::t('backend', 'Id User'),
            'name' => Yii::t('backend', 'Name'),
            'description' => Yii::t('backend', 'Description'),
            'created_at' => Yii::t('backend', 'Created At'),
            'updated_at' => Yii::t('backend', 'Updated At'),
            'state' => Yii::t('backend', 'State'),
            'parameterCode' => Yii::t('backend', 'Parameter Code'),
            'value' => Yii::t('backend', 'Value'),
        ];
    }

    /**
     * @inheritdoc
     * @return ParametersQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ParametersQuery(get_called_class());
    }
}
