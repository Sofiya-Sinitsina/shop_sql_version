<?php

use app\models\Dishes;
use yii\data\ActiveDataProvider;

$this->title = 'Подписка';

/** @var ActiveDataProvider $provider */
/** @var Dishes[] $models */
?>

<div class="container text-center">
    <?php $models = $provider->getModels(); ?>
    <?php if ($models) { ?>
        <div class="row row-cols-2">
            <?php $i=1; foreach ($models as $model) { ?>
                <div class="col">
                    <img src="<?= $model->dish_photo?>" class="rounded mx-auto d-block" alt="photo" width="500"> <br>
                    <?= $model->dish_name_ru ?> <br>
                    <?= $model->dish_price.' тг' ?> <br>
                    <button type="button" class="btn btn-primary"><?= Yii::t('labels', 'Добавить в корзину')?></button>
                </div>
                <?php $i++; } ?>

        </div>
    <?php } else { ?>
        <div class="alert alert-danger">
            Данных не добавлено
        </div>
    <?php } ?>
</div>

<br><br><br>
