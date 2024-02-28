<?php

namespace app\models;

class DrinkDishes extends Dishes
{
    const TYPE = 'drink';

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