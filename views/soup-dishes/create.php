<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\SoupDishes $model */

$this->title = Yii::t('app', 'Create Soup Dishes');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Soup Dishes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="soup-dishes-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
