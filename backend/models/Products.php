<?php

namespace backend\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "products".
 *
 * @property integer $idProduct
 * @property integer $idUser
 * @property string $name
 * @property string $description
 * @property string $quantityPurchased
 * @property string $amountSold
 * @property string $remainingAmount
 * @property integer $idUnit
 * @property string $nameUnit
 * @property string $price
 * @property string $created_at
 * @property string $updated_at
 * @property integer $taxes
 */
class Products extends \yii\db\ActiveRecord
{
    /**
    *  @var UploadedFile|Null file attribute
    */
    public $file;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'products';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            //[['idProduct', 'name', 'description', 'quantityPurchased'], 'required'],
            [['name', 'description', 'quantityPurchased'], 'required'],
            [['idProduct', 'idUser', 'idUnit', 'taxes'], 'integer'],
            [['quantityPurchased', 'amountSold', 'remainingAmount', 'price'], 'number'],
            [['created_at', 'updated_at'], 'safe'],
            [['name'], 'string', 'max' => 50],
            [['description'], 'string', 'max' => 200],
            [['nameUnit'], 'string', 'max' => 45],
            [['image'], 'safe'],
            [['image'], 'file', 'extensions'=>'jpg, gif, png'],
            [['file'], 'file'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idProduct' => Yii::t('backend', 'Id Product'),
            'idUser' => Yii::t('backend', 'Id User'),
            'name' => Yii::t('backend', 'Name'),
            'description' => Yii::t('backend', 'Description'),
            'quantityPurchased' => Yii::t('backend', 'Quantity Purchased'),
            'amountSold' => Yii::t('backend', 'Amount Sold'),
            'remainingAmount' => Yii::t('backend', 'Remaining Amount'),
            'idUnit' => Yii::t('backend', 'Id Unit'),
            'nameUnit' => Yii::t('backend', 'Name Unit'),
            'price' => Yii::t('backend', 'Price'),
            'created_at' => Yii::t('backend', 'Created At'),
            'updated_at' => Yii::t('backend', 'Updated At'),
            'taxes' => Yii::t('backend', 'Taxes'),
            'file' => Yii::t('backend', 'Image'),
        ];
    }

    /**
     * @inheritdoc
     * @return ProductsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ProductsQuery(get_called_class());
    }

}