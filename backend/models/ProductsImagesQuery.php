<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[ProductsImages]].
 *
 * @see ProductsImages
 */
class ProductsImagesQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return ProductsImages[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return ProductsImages|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}