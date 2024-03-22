<?php global $asset;

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;
use yii\helpers\Url;

AppAsset::register($this);
$asset = AppAsset::register($this);
$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Yii::getAlias('@web/favicon.ico')]);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>

<!--<header id="header">-->
<!--    --><?php
//    NavBar::begin([
//        'brandLabel' => Yii::$app->name,
//        'brandUrl' => Yii::$app->homeUrl,
//        'options' => ['class' => 'navbar-expand-md navbar-dark bg-dark fixed-top']
//    ]);
//    echo Nav::widget([
//        'options' => ['class' => 'navbar-nav'],
//        'items' => [
//            ['label' => 'Home', 'url' => ['/site/index']],
//            ['label' => 'About', 'url' => ['/site/about']],
//            ['label' => 'Contact', 'url' => ['/site/contact']],
//            Yii::$app->user->isGuest
//                ? ['label' => 'Login', 'url' => ['/site/login']]
//                : '<li class="nav-item">'
//                    . Html::beginForm(['/site/logout'])
//                    . Html::submitButton(
//                        'Logout (' . Yii::$app->user->identity->username . ')',
//                        ['class' => 'nav-link btn btn-link logout']
//                    )
//                    . Html::endForm()
//                    . '</li>'
//        ]
//    ]);
//    NavBar::end();
//    ?>
<!--</header>-->

<header>
    <!--первый хэдинг-->
    <nav id="nav_dark" class="navbar border-bottom border-body text-light" data-bs-theme="dark">
        <div class="container-fluid">
            <form id="search_dark" class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="<?= Yii::t('labels','Поиск...')?>" aria-label="Search">
            </form>
            <p><?= Yii::t('labels', 'Быстрые и вкусные перекусы по приемлемым ценам')?></p>

            <?php if(Yii::$app->user->isGuest): ?>
                <?= Html::button(Yii::t('labels', 'Войти'), ['value' => Url::to(['site/login', 'id'=>'login-form']), 'title' => 'Login', 'class' => 'showModalButton btn navbar-brand']); ?>
            <?php else: ?>
                <span><?= Yii::$app->user->identity->username ?></span>
                <a class="navbar-brand" href="<?= Url::to(['site/logout'])?>">
                    <?= Yii::t('labels', 'Выйти')?>
                </a>
            <?php endif; ?>

        </div>
    </nav>

    <!--второй хэдинг-->
    <nav id="nav_white" class="navbar">
        <div class="container-fluid ">
            <?= $this->render('language_list')?>
            <p class="text-start">
                <a class="navbar-brand" href="<?= Url::to(['subs'])?>"><?= Yii::t('labels', 'Меню')?></a>
                <a class="navbar-brand" href="#cont"><?= Yii::t('labels', 'Контакты')?></a>
            </p>
            <a class="navbar-brand" href="<?= Url::to(['index'])?>">
                <img src="<?= $asset->baseUrl.'/img/ph1.JPG'?>" alt="Bootstrap" height="76">
            </a>
            <div class="text-end">
            <?= $this->render('languages')?>
            <a class="navbar-brand"><?= Yii::t('labels', 'Корзина')?></a>
            </div>

        </div>
    </nav>
</header>

<main id="main" class="flex-shrink-0" role="main">
    <div class="container">
        <?php if (!empty($this->params['breadcrumbs'])): ?>
            <?= Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]) ?>
        <?php endif ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</main>


полуфутер
<div id="footer_or" class="text-start row row-cols-1 row-cols-md-3 g-4 align-items-center">
    <div id="f1">
        <h3><?= Yii::t('labels','Ресторан')?></h3><br>
        <a href="<?= Url::to(['site/subs'])?>"><?= Yii::t('labels', 'Меню')?></a><br>
        <a href="<?= Url::to(['site/delivery'])?>"><?= Yii::t('labels', 'Доставка')?></a><br>
        <a href="<?= Url::to(['site/qa'])?>"><?= Yii::t('labels', 'Вопросы и ответы')?></a><br>
    </div>
    <div id="f2" class="text-center">
        <h2><?= Yii::t('labels', 'Обновления')?></h2>
        <p><?= Yii::t('content','Подпишитесь для уведомления об изменении меню и актуальных акциях')?></p>
        <input type="text" class="form-control" id="specificSizeInputName" placeholder="email*">
        <button type="submit" class="btn btn-dark m-3"><?= Yii::t('labels', 'Подписаться')?></button>
        <br><br>
    </div>
    <div id="f3" class="text-start">
        <p><a name="cont"></a></p>
        <h3><?= Yii::t('labels','Контакты')?></h3><br>
        <p><?= Yii::t('content','ул. Арбат, 1а,  Москва,')?><br>
            <?= Yii::t('content','119019, Россия')?><br>
            info@mysite.ru<br>
            +7 123 456-78-90</p><br>
    </div>
</div>

<!--основной футер-->
<footer class="text-center"> <?= Yii::t('labels', 'Создано Синициной Софией')?> </footer>

<?php
yii\bootstrap5\Modal::begin([
    'headerOptions' => ['id' => 'modalHeader'],
    'id' => 'modal',
    'size' => 'modal-lg',
    //keeps from closing modal with esc key or by clicking out of the modal.
    // user must click cancel or X to close
    'clientOptions' => ['backdrop' => 'static', 'keyboard' => FALSE]
]);
echo "<div id='modalContent'></div>";
yii\bootstrap5\Modal::end();
?>


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>


