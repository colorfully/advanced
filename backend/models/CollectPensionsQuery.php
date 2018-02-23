<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[CollectPensions]].
 *
 * @see CollectPensions
 */
class CollectPensionsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return CollectPensions[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return CollectPensions|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
