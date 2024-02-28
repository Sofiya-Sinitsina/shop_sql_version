<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Composition]].
 *
 * @see Composition
 */
class CompositionQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Composition[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Composition|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
