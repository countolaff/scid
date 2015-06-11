<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "orders".
 *
 * @property integer $idOrder
 * @property integer $idUser
 * @property string $date
 * @property integer $state
 * @property string $observationOrder
 * @property string $totalValue
 *
 * @property DetailOrders[] $detailOrders
 */
class Orders extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'orders';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idUser', 'state'], 'integer'],
            [['date'], 'safe'],
            [['totalValue'], 'number'],
            [['observationOrder','nameState'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idOrder' => Yii::t('frontend', 'Id Order'),
            'idUser' => Yii::t('frontend', 'Id User'),
            'date' => Yii::t('frontend', 'Date'),
            'state' => Yii::t('frontend', 'State Code'),
            'nameState' => Yii::t('frontend', 'State'),
            'observationOrder' => Yii::t('frontend', 'Observation Order'),
            'totalValue' => Yii::t('frontend', 'Total Value'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetailOrders()
    {
        return $this->hasMany(DetailOrders::className(), ['idOrder' => 'idOrder']);
    }

    /**
     * @inheritdoc
     * @return OrdersQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new OrdersQuery(get_called_class());
    }
}
