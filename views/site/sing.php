<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\forms\SingUpForm $model */
/** @var ActiveForm $form */
?>


<div class="content px-5" id="main-content">
    <?php $form = ActiveForm::begin([
        'id' => 'SignUpForm',
        'fieldConfig' => [
            'template' => "{label}\n{input}\n{error}",
            'labelOptions' => ['class' => 'col-lg-1 col-form-label mr-lg-3'],
            'inputOptions' => ['class' => 'col-lg-3 form-control'],
            'errorOptions' => ['class' => 'col-lg-7 invalid-feedback'],
        ],
    ]);
    ?>

    <?= $form->field($model, 'username')->label(Yii::t('form','Имя пользователя'))->textInput()?>
    <?= $form->field($model, 'email')->label('email')?>
    <?= $form->field($model, 'password')->label(Yii::t('form','Пароль'))->passwordInput()?>

    <div class="form-group text-center">
        <div>
            <?= Html::submitButton(Yii::t('labels','Зарегистрироваться'), ['class' => 'btn btn-primary', 'name' => 'sing-up-button'])?>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?= Yii::t('labels', 'Закрыть')?></button>
        </div>
    </div>

    <?php ActiveForm::end() ?>

</div>
