<?php

/** @var yii\web\View $this */

use app\assets\AppAsset;
use yii\helpers\Url;

$asset = AppAsset::register($this);

$this->title = 'Boxes_sql';
?>

<div class="carousel-inner">
    <div class="carousel-item active">
        <div class="carousel-caption d-none d-md-block text-white text-end position-absolute top-50">
            <h1><?= Yii::t('content', 'Быстрые и качественные ')?></h1>
            <h1><?= Yii::t('content', 'приемы пищи круглосуточно')?></h1><br>
            <p class="text-black"><?= Yii::t('content', 'Супы на любой вкус и настроение.')?> <br> <?= Yii::t('content', 'Ешьте правильно и с удовольствием')?></p><br>
            <button type="button" class="btn btn-dark"><a href="<?= Url::to(['subs'])?>" id="first_page_buttons"><?= Yii::t('labels', 'Посмотреть меню')?></a></button>
        </div>
        <img src="<?= $asset->baseUrl.'/img/cafe.JPG'?>" alt="Bootstrap" width="1300">
    </div>
</div>

<!--бренды-->
<!--<div id="carouselExampleIndicators" class="carousel slide">-->
<!--    <h1 class="text-center">Бренды</h1>-->
<!--    <div class="carousel-indicators">-->
<!--        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>-->
<!--        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>-->
<!--    </div>-->
<!--    <div class="carousel-inner">-->
<!--        <div class="carousel-item active">-->
<!--            <img src="--><?php //= $asset->baseUrl.'/img/br1.JPG'?><!--" class="d-block w-100" alt="...">-->
<!--        </div>-->
<!--        <div class="carousel-item">-->
<!--            <img src="--><?php //= $asset->baseUrl.'/img/br2.JPG'?><!--" class="d-block w-100" alt="...">-->
<!--        </div>-->
<!--    </div>-->
<!--    <button class="carousel-control-prev" type="button" data-bs-target="" data-bs-slide="prev">-->
<!--        <span class="carousel-control-prev-icon" aria-hidden="true"></span>-->
<!--        <span class="visually-hidden">Previous</span>-->
<!--    </button>-->
<!--    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">-->
<!--        <span class="carousel-control-next-icon" aria-hidden="true"></span>-->
<!--        <span class="visually-hidden">Next</span>-->
<!--    </button>-->
<!--</div>-->

<!--<h1 class="text-center">Как мы работаем</h1><br>-->
<!---->
<!--<!--три этапа как мы работаем-->-->
<!--<div class="row row-cols-1 row-cols-md-3 g-4">-->
<!--    <div class="col">-->
<!--        <div class="card h-100 text-center">-->
<!--            <img src="--><?php //= $asset->baseUrl.'/img/car1.JPG'?><!--" class="card-img-top" alt="...">-->
<!--            <div class="card-body">-->
<!--                <h4 class="card-title">Выберите бокс</h4>-->
<!--                <h5 class="card-text">Это текст. Нажмите здесь, чтобы изменить его.</h5>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--    <div class="col">-->
<!--        <div class="card h-100 text-center">-->
<!--            <img src="--><?php //= $asset->baseUrl.'/img/car2.JPG'?><!--" class="card-img-top" alt="...">-->
<!--            <div class="card-body">-->
<!--                <h4 class="card-title">Выберите подписку</h4>-->
<!--                <h5 class="card-text">Это текст. Нажмите здесь, чтобы изменить его.</h5>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--    <div class="col">-->
<!--        <div class="card h-100 text-center">-->
<!--            <img src="--><?php //= $asset->baseUrl.'/img/car3.JPG'?><!--" class="card-img-top" alt="...">-->
<!--            <div class="card-body">-->
<!--                <h4 class="card-title">Доставка раз в месяц</h4>-->
<!--                <h5 class="card-text">Это текст. Нажмите здесь, чтобы изменить его.</h5>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
<!---->
<!--<!--про упаковки-->-->
<!--<div class="text-center">-->
<!--    <button type="button" class="btn btn-dark"><a href="--><?php //= Url::to(['subs'])?><!--" id="first_page_buttons">Заказать коробочки</a></button>-->
<!--    <h1>Наши упаковки</h1>-->
<!--    <button type="button" class="btn btn-dark"><a href="--><?php //= Url::to(['subs'])?><!--" id="first_page_buttons">Заказать коробочки</a></button>-->
<!--    <br><br><br>-->
<!--</div>-->

