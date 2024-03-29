<?php

use yii\bootstrap5\Html;

echo Html::beginTag('div', ['class' => 'btn-group']);

echo Html::a('Eng', array_merge(Yii::$app->request->get(), [Yii::$app->controller->route, 'language' => 'en']), ['class' => 'btn black-btn']);
echo Html::a('Рус', array_merge(Yii::$app->request->get(), [Yii::$app->controller->route, 'language' => 'ru']), ['class' => 'btn black-btn']);
echo Html::a('Қаз', array_merge(Yii::$app->request->get(), [Yii::$app->controller->route, 'language' => 'kk']), ['class' => 'btn black-btn']);

echo Html::endTag('div');
