<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "detail_orders".
 *
 * @property integer $idDetailOrder
 * @property integer $idOrder
 * @property integer $idProduct
 * @property string $productName
 * @property integer $quantityPurchased
 * @property string $price
 * @property string $observationDetailorder
 *
 * @property Orders $idOrder0
 */
class Detailorders extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'detail_orders';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idDetailOrder'], 'required'],
            [['idDetailOrder', 'idOrder', 'idProduct', 'quantityPurchased'], 'integer'],
            [['price'], 'number'],
            [['productName'], 'string', 'max' => 45],
            [['observationDetailorder'], 'string', 'max' => 100],
            [['idDetailOrder'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idDetailOrder' => Yii::t('frontend', 'Id Detail Order'),
            'idOrder' => Yii::t('frontend', 'Id Order'),
            'idProduct' => Yii::t('frontend', 'Id Product'),
            'productName' => Yii::t('frontend', 'Product Name'),
            'quantityPurchased' => Yii::t('frontend', 'Quantity Purchased'),
            'price' => Yii::t('frontend', 'Price'),
            'observationDetailorder' => Yii::t('frontend', 'Observation Detailorder'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdOrder0()
    {
        return $this->hasOne(Orders::className(), ['idOrder' => 'idOrder']);
    }

    /**
     * @inheritdoc
     * @return DetailOrdersQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new DetailOrdersQuery(get_called_class());
    }
}
