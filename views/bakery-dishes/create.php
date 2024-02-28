<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\BakeryDishes $model */

$this->title = Yii::t('app', 'Create Bakery Dishes');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Bakery Dishes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bakery-dishes-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
