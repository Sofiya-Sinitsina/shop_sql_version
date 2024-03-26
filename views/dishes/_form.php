<?php

use app\models\components\Enum;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Dishes $model */
/** @var yii\widgets\ActiveForm $form */
/** @var string $suffix */
?>

<div class="dishes-form">

    <?php $form = ActiveForm::begin(); ?>
    <?php $ingredient = ArrayHelper::map(\app\models\Ingredients::find()->all(), 'id', 'ingredient_name_'.$suffix) ?>

    <?= $form->field($model, 'dish_name_en')->label('Dish name')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'dish_name_ru')->label('Название блюда')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'dish_name_kk')->label('Тағамның атауы')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'composition')->label(Yii::t('form', 'Состав'))->widget(Select2::classname(), [
        'data' => $ingredient,
        'options' => ['multiple' => true,'placeholder' => Yii::t('form', 'Выберите ингредиент ...')],
        'pluginOptions' => [
            'allowClear' => true
        ],

    ]);?>

    <?= $form->field($model, 'dish_price')->label(Yii::t('form', 'Стоимость'))->textInput() ?>

    <?= $form->field($model, 'dish_photo')->label(Yii::t('form', 'Фото'))->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'type')->label(Yii::t('form', 'Тип'))->dropDownList(
            [
                    Enum::SOUP=>Yii::t('content', 'суп'),
                Enum::DRINK=>Yii::t('content', 'напиток'),
                Enum::BAKERY=>Yii::t('content', 'выпечка'),
            ]
    ) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Сохранить'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
