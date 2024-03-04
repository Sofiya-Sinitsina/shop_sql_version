<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Ingredients $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="ingredients-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ingredient_name_en')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'ingredient_name_ru')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'ingredient_name_kk')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
