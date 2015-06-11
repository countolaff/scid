<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[Freights]].
 *
 * @see Freights
 */
class FreightsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Freights[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Freights|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}