<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dishes".
 *
 * @property int $id
 * @property string $dish_name
 * @property int $dish_price
 * @property string|null $dish_photo
 * @property string $type
 */
class Dishes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName(): string
    {
        return '{{%dishes%}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['dish_name_en', 'dish_price', 'type'], 'required'],
            [['dish_price'], 'integer'],
            [['dish_name_en',  'dish_photo', 'type'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels(): array
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'dish_name_en' => Yii::t('app', 'Dish Name'),
            'dish_price' => Yii::t('app', 'Dish Price'),
            'dish_photo' => Yii::t('app', 'Dish Photo'),
            'type' => Yii::t('app', 'Type'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return DishesQuery the active query used by this AR class.
     */
    public static function find(): DishesQuery
    {
        return new DishesQuery(get_called_class());
    }

    public static function instantiate($row)
    {
        switch ($row['type']) {
            case SoupDishes::TYPE:
                return new SoupDishes();
            case BakeryDishes::TYPE:
                return new BakeryDishes();
            case DrinkDishes::TYPE:
                return new DrinkDishes();
            default:
                return new self;
        }
    }
}
