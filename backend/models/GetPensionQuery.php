<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[GetPension]].
 *
 * @see GetPension
 */
class GetPensionQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return GetPension[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return GetPension|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
