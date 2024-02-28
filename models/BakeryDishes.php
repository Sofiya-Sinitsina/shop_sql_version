<?php

namespace app\models;

class BakeryDishes extends Dishes
{
    const TYPE = 'bakery';

    public function init()
    {
        $this->type = self::TYPE;
        parent::init();
    }

    public static function find(): DishesQuery
    {
        return new DishesQuery(get_called_class(), ['type' => self::TYPE, 'tableName' => self::tableName()]);
    }

    public function beforeSave($insert): bool
    {
        $this->type = self::TYPE;
        return parent::beforeSave($insert);
    }
}