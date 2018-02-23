<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[RecordPensions]].
 *
 * @see RecordPensions
 */
class RecordPensionsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return RecordPensions[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return RecordPensions|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
