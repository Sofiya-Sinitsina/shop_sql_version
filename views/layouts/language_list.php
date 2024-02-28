<?php

use yii\bootstrap5\Html;

?>


    <ul class="dropdown-menu">
        <li><?= Html::a('En', array_merge(Yii::$app->request->get(),
                [
                    Yii::$app->controller->route, 'language' => 'en'
                ]
            )); ?></li>
        <li><?= Html::a('Ru', array_merge(Yii::$app->request->get(),
                [
                    Yii::$app->controller->route, 'language' => 'ru'
                ]
            )); ?></li>
        <li><?= Html::a('Kz', array_merge(Yii::$app->request->get(),
                [
                    Yii::$app->controller->route, 'language' => 'kz'
                ]
            )); ?></li>
    </ul>

