<?php

use app\models\Dishes;
use app\widgets\MyDetailView;
use app\widgets\MyLinkPager;
use yii\data\ActiveDataProvider;
use yii\helpers\VarDumper;
use yii\widgets\LinkPager;


$this->title = 'Подписка';

/** @var ActiveDataProvider $provider */
/** @var Dishes[] $models */
/** @var yii\web\View $this */
/** @var string $suffix  */

?>

<div class="container text-center">
    <?php $models = $provider->getModels(); ?>
    <?php if ($models) { ?>
        <div  class="row row-cols-2">
            <?php $i=1; foreach ($models as $model) { ?>
                <div style="width: 50%" class="col">
                    <img src="<?= $model->dish_photo?>" class="rounded mx-auto d-block" alt="photo" height="300"> <br>
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

<div>
<?= LinkPager::widget([
    'pagination' => $provider->pagination,
]) ?>
</div>
<br><br><br>
