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
            'idPackage' => Yii::t('backend', 'Id Package'),
            'idUser' => Yii::t('backend', 'Id User'),
            'idFreight' => Yii::t('backend', 'Id Freight'),
            'idOrder' => Yii::t('backend', 'Id Order'),
            'nameName' => Yii::t('backend', 'Name'),
            'description' => Yii::t('backend', 'Description'),
            'created_at' => Yii::t('backend', 'Created At'),
            'updated_at' => Yii::t('backend', 'Updated At'),
            'packageState' => Yii::t('backend', 'Package State'),
            'nameState' => Yii::t('backend', 'State'),
            'observations' => Yii::t('backend', 'Observations'),
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
