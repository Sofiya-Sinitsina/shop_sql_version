<?php

use app\models\Dishes;
use app\widgets\MyDetailView;
use yii\bootstrap5\LinkPager;
use yii\data\ActiveDataProvider;
use yii\helpers\Url;


$this->title = 'Подписка';

/** @var ActiveDataProvider $provider */
/** @var Dishes[] $models */
/** @var yii\web\View $this */
/** @var string $suffix  */

?>

<div class="container text-center">
    <br>
    <a class="btn btn-outline-dark" href="<?= Url::to(['subs'])?>"><?= Yii::t('labels', 'все')?></a>
    <a class="btn btn-outline-dark" href="<?= Url::to(['subs', 'type' => 'soup'])?>"><?= Yii::t('labels', 'супы')?></a>
    <a class="btn btn-outline-dark" href="<?= Url::to(['subs', 'type' => 'drink'])?>"><?= Yii::t('labels', 'напитки')?></a>
    <a class="btn btn-outline-dark" href="<?= Url::to(['subs', 'type' => 'bakery'])?>"><?= Yii::t('labels', 'выпечка')?></a>
    <br><br>
    <?php $models = $provider->getModels(); ?>
    <?php if ($models) { ?>
        <div  class="row row-cols-2">
            <?php $i=1; foreach ($models as $model) { ?>
                <div style="width: 50%" class="col">
                    <img src="<?= $model->dish_photo?>" class="rounded mx-auto d-block" alt="photo" height="300" width="400"> <br>
                    <h4><?= $model->{'dish_name_'.$suffix} ?> <br></h4>
                    <?=
                    MyDetailView::widget([
                            'model' => $model,
                            'attributes' => [
                                    ['label'=> Yii::t('form','Состав'),
                                    'value'=> function(Dishes $model) use ($suffix) {
                                    $cur_ing =[];
                                    foreach ($model->composition as $ingredient) {
                                        $cur_ing['en'][] = $ingredient->ingredient->ingredient_name_en;
                                        $cur_ing['ru'][] = $ingredient->ingredient->ingredient_name_ru;
                                        $cur_ing['kk'][] = $ingredient->ingredient->ingredient_name_kk;
                                    }

                                    return implode(', ', $cur_ing[$suffix]??[]);
                                },
                                'contentOptions'=>['class'=>'text-left'],
                                'headerOptions'=>['class'=>'text-center align-mode']],
                            ],
                    ]); ?>
                    <?= $model->dish_price.' тг' ?> <br>
                    <button type="button" class="btn btn-primary"><?= Yii::t('labels', 'Добавить в корзину')?></button><br><br>
                </div>
                <?php $i++; } ?>

        </div>
    <?php } else { ?>
        <div class="alert alert-danger">
            Данных не добавлено
        </div>
    <?php } ?>
</div>

<div id="pagination">
<?= LinkPager::widget([
    'pagination' => $provider->pagination,
]) ?>
</div>
<br><br><br>
