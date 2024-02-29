<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "composition".
 *
 * @property int $id
 * @property int|null $dish_id
 * @property int|null $ingredient_id
 *
 * @property Dishes $dish
 * @property Ingredients $ingredient
 */
class Composition extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'composition';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['dish_id', 'ingredient_id'], 'required'],
            [['dish_id', 'ingredient_id'], 'integer'],
            [['dish_id'], 'exist', 'skipOnError' => true, 'targetClass' => Dishes::class, 'targetAttribute' => ['dish_id' => 'id']],
            [['ingredient_id'], 'exist', 'skipOnError' => true, 'targetClass' => Ingredients::class, 'targetAttribute' => ['ingredient_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'dish_id' => Yii::t('app', 'Dish ID'),
            'ingredient_id' => Yii::t('app', 'Ingredient ID'),
        ];
    }

    /**
     * Gets query for [[Dish]].
     *
     * @return \yii\db\ActiveQuery|DishesQuery
     */
    public function getDish()
    {
        return $this->hasOne(Dishes::class, ['id' => 'dish_id']);
    }

    /**
     * Gets query for [[Ingredient]].
     *
     * @return \yii\db\ActiveQuery|IngredientsQuery
     */
    public function getIngredient()
    {
        return $this->hasOne(Ingredients::class, ['id' => 'ingredient_id']);
    }

    /**
     * {@inheritdoc}
     * @return CompositionQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CompositionQuery(get_called_class());
    }
}
