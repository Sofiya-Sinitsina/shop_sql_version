<?php

use yii\helpers\Url;

$this->title = 'Admin';

?>

<div class="container text-center">
    <a class="btn btn-outline-dark" href="<?= Url::to(['dishes/create'])?>"><?= Yii::t('app', 'Добавить блюдо')?></a>
    <a class="btn btn-outline-dark" href="<?= Url::to(['dishes/index'])?>"><?= Yii::t('app', 'Обновить')?></a>
</div>