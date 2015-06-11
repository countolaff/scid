<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "packages_control".
 *
 * @property integer $idPackage
 * @property integer $idUser
 * @property integer $idFreight
 * @property integer $idOrder
 * @property string $nameName
 * @property string $description
 * @property string $created_at
 * @property string $updated_at
 * @property integer $packageState
 * @property string $observations
 */
class Packagescontrol extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'packages_control';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            //[['idPackage', 'idUser', 'idFreight', 'idOrder'], 'required'],
            [['idUser', 'idFreight', 'idOrder'], 'required'],
            [['idPackage', 'idUser', 'idFreight', 'idOrder', 'packageState'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['nameName','nameState'], 'string', 'max' => 45],
            [['description'], 'string', 'max' => 200],
            [['observations'], 'string', 'max' => 400],
            [['idPackage'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idPackage' => Yii::t('app', 'Id Package'),
            'idUser' => Yii::t('app', 'Id User'),
            'idFreight' => Yii::t('app', 'Id Freight'),
            'idOrder' => Yii::t('app', 'Id Order'),
            'nameName' => Yii::t('app', 'Name'),
            'description' => Yii::t('app', 'Description'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'packageState' => Yii::t('app', 'Package State'),
            'nameState' => Yii::t('app', 'State'),
            'observations' => Yii::t('app', 'Observations'),
        ];
    }

    /**
     * @inheritdoc
     * @return PackagesControlQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PackagesControlQuery(get_called_class());
    }
}
