<?php

use yii\bootstrap5\Html;


echo Html::a('En', array_merge(Yii::$app->request->get(),
    [
        Yii::$app->controller->route, 'language' => 'en'
    ]
));
echo '|';
echo Html::a('Ru', array_merge(Yii::$app->request->get(),
    [
        Yii::$app->controller->route, 'language' => 'ru'
    ]
));
echo '|';
echo Html::a('Kz', array_merge(Yii::$app->request->get(),
    [
        Yii::$app->controller->route, 'language' => 'kk'
    ]
));

?>





