<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */

/** @var \app\models\LoginForm $model */


use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

$this->params['breadcrumbs'][] = $this->title;
?>
<div class="content px-5" id="main-content">
    <h1><?= Html::encode($this->title) ?></h1>
<!--    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>-->

    <div class="row">
        <div class="col-lg-12">

            <?php $form = ActiveForm::begin([
                'id' => 'login-form',
                'fieldConfig' => [
                    'template' => "{label}\n{input}\n{error}",
                    'labelOptions' => ['class' => 'col-lg-1 col-form-label mr-lg-3'],
                    'inputOptions' => ['class' => 'col-lg-3 form-control'],
                    'errorOptions' => ['class' => 'col-lg-7 invalid-feedback'],
                ],
            ]); ?>

            <?= $form->field($model, 'username')->label(Yii::t('form','Имя пользователя'))->textInput(['autofocus' => true]) ?>

            <?= $form->field($model, 'password')->label(Yii::t('form','Пароль'))->passwordInput() ?>

            <?= $form->field($model, 'rememberMe')->checkbox([
                'template' => "<div class=\"custom-control custom-checkbox\">{input} {label}</div>\n<div class=\"col-lg-8\">{error}</div>",
            ]) ?>

            <div class="form-group">
                <div>
                    <?= Html::submitButton(Yii::t('labels','Войти'), ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Х</button>
                </div>
            </div>

            <?php ActiveForm::end(); ?>

        </div>
    </div>
</div>
