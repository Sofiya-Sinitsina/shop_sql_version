<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Dishes $model */

$this->title = Yii::t('app', 'Добавить блюдо');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Блюда'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dishes-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
