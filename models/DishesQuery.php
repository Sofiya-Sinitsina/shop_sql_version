<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Dishes]].
 *
 * @see Dishes
 */
class DishesQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

//    /**
//     * {@inheritdoc}
//     * @return Dishes[]|array
//     */
//    public function all($db = null)
//    {
//        return parent::all($db);
//    }
//
//    /**
//     * {@inheritdoc}
//     * @return Dishes|array|null
//     */
//    public function one($db = null)
//    {
//        return parent::one($db);
//    }

    public $type;
    public $tableName;

    public function prepare($builder)
    {
        if ($this->type !== null) {
            $this->andWhere(["$this->tableName.type" => $this->type]);
        }
        return parent::prepare($builder);
    }

}
