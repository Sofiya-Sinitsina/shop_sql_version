<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ingredients".
 *
 * @property int $id
 * @property string $ingredient_name_en
 * @property string $ingredient_name_ru
 * @property string $ingredient_name_kk
 */
class Ingredients extends \yii\db\ActiveRecord
{
    /**
     * @var mixed|null
     */

    /**
     * {@inheritdoc}
     */
    public static function tableName(): string
    {
        return 'ingredients';
    }

    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['ingredient_name_en', 'ingredient_name_ru', 'ingredient_name_kk'], 'required'],
            [['ingredient_name_en', 'ingredient_name_ru', 'ingredient_name_kk'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels(): array
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'ingredient_name' => Yii::t('app', 'Ingredient Name'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return IngredientsQuery the active query used by this AR class.
     */
    public static function find(): IngredientsQuery
    {
        return new IngredientsQuery(get_called_class());
    }
}
