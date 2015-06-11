<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[Packagescontrol]].
 *
 * @see Packagescontrol
 */
class PackagesControlQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Packagescontrol[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Packagescontrol|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}