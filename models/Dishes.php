<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dishes".
 *
 * @property int $id
 * @property string $dish_name_en
 * @property string $dish_name_ru
 * @property string $dish_name_kk
 * @property int $dish_price
 * @property string|null $dish_photo
 * @property string $type
 *
 * @property Composition[] $composition
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
            [['dish_name_en', 'dish_name_ru', 'dish_name_kk', 'dish_price', 'type'], 'required'],
            [['dish_price'], 'integer'],
            [['dish_name_en', 'dish_name_ru', 'dish_name_kk',  'dish_photo', 'type'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels(): array
    {
        return [
            'id' => 'ID',
            'dish_name_en' => 'Dish name',
            'dish_name_ru' => 'Название блюда',
            'dish_name_kk' => 'Тағамның атауы',
            'dish_price' => Yii::t('form', 'Цена блюда'),
            'dish_photo' => Yii::t('form', 'Фото блюда'),
            'type' => Yii::t('form', 'Тип'),
        ];
    }

    public function getComposition(): \yii\db\ActiveQuery
    {
        return $this->hasMany(Composition::class, ['dish_id' => 'id']);
    }


    /**
     * {@inheritdoc}
     * @return DishesQuery the active query used by this AR class.
     */
    public static function find(): DishesQuery
    {
        return new DishesQuery(get_called_class());
    }


    public static function instantiate($row): DrinkDishes|SoupDishes|BakeryDishes|Dishes
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
