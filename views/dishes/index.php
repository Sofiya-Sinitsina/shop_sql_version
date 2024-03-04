<?php

use app\models\Dishes;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\VarDumper;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */
/** @var string $suffix  */

$this->title = Yii::t('app', 'Dishes');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dishes-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Dishes'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute'=>'dish_name_'.$suffix,
                'format'=>'raw',

            ],
            ['attribute'=> Yii::t('form','Состав'),
                'format'=>'raw',
                'contentOptions'=>['class'=>'text-center align-mode'],
                'headerOptions'=>['class'=>'text-center align-mode'],
                'value'=> static function(Dishes $model) {
                    $cur_ing =[];
                    foreach ($model->composition as $ingredient) {
//                        \yii\helpers\VarDumper::dump($ingredient);
                        $cur_ing[] = $ingredient->ingredient->ingredient_name_en;
                    }
                    return implode(', ', $cur_ing);
                }],
            'dish_price',
            'dish_photo',
            'type',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Dishes $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
