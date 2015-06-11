<?php

namespace frontend\models;

/**
 * This is the ActiveQuery class for [[Detailorders]].
 *
 * @see Detailorders
 */
class DetailOrdersQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Detailorders[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Detailorders|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}