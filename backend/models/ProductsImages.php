<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "products_images".
 *
 * @property integer $idImage
 * @property integer $idProduct
 * @property string $image
 * @property string $avatar
 *
 * @property Products $idProduct0
 */
class ProductsImages extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'products_images';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idImage'], 'required'],
            [['idImage', 'idProduct'], 'integer'],
            [['image', 'avatar'], 'string', 'max' => 45]
            [['avatar', 'filename', 'image'], 'safe'],
            [['image'], 'file', 'extensions'=>'jpg, gif, png'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idImage' => Yii::t('backend', 'Id Image'),
            'idProduct' => Yii::t('backend', 'Id Product'),
            'image' => Yii::t('backend', 'Image'),
            'avatar' => Yii::t('backend', 'Avatar'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdProduct0()
    {
        return $this->hasOne(Products::className(), ['idProduct' => 'idProduct']);
    }

    /**
     * @inheritdoc
     * @return ProductsImagesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ProductsImagesQuery(get_called_class());
    }
}
