<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\BakeryDishes $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="bakery-dishes-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'dish_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ingredient_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dish_price')->textInput() ?>

    <?= $form->field($model, 'dish_photo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'type')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
