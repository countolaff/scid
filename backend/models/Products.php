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
            'idProduct' => Yii::t('app', 'Id Product'),
            'idUser' => Yii::t('app', 'Id User'),
            'name' => Yii::t('app', 'Name'),
            'description' => Yii::t('app', 'Description'),
            'quantityPurchased' => Yii::t('app', 'Quantity Purchased'),
            'amountSold' => Yii::t('app', 'Amount Sold'),
            'remainingAmount' => Yii::t('app', 'Remaining Amount'),
            'idUnit' => Yii::t('app', 'Id Unit'),
            'nameUnit' => Yii::t('app', 'Name Unit'),
            'price' => Yii::t('app', 'Price'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'taxes' => Yii::t('app', 'Taxes'),
            'file' => Yii::t('app', 'Image'),
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