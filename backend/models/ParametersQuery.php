<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[Parameters]].
 *
 * @see Parameters
 */
class ParametersQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Parameters[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Parameters|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}