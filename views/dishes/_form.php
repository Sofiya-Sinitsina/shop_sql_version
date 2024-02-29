<?php

use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Dishes $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="dishes-form">

    <?php $form = ActiveForm::begin(); ?>
    <?php $ingredient = ArrayHelper::map(\app\models\Ingredients::find()->all(), 'id', 'ingredient_name_en') ?>

    <?= $form->field($model, 'dish_name_en')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'dish_name_ru')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'dish_name_kk')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'composition')->widget(Select2::classname(), [
        'data' => $ingredient,
        'options' => ['multiple' => true,'placeholder' => 'Choose the ingredient ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],

    ]);?>

    <?= $form->field($model, 'dish_price')->textInput() ?>

    <?= $form->field($model, 'dish_photo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'type')->dropDownList(
            [
                    'soup'=>'soup',
                'drink'=>'drink',
                'bakery'=>'bakery',
            ]
    ) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
