<?php

namespace app\commands;

use Yii;
use yii\base\Exception;
use yii\console\Controller;

class RbacController extends Controller
{
    /**
     * @throws Exception
     * @throws \Exception
     */
    public function actionInit()
    {
        $auth = Yii::$app->authManager;

        $auth->removeAll();


        $admin = $auth->createRole('admin');
        $auth->add($admin);

        $viewAdminPage = $auth->createPermission('viewAdminPage');
        $viewAdminPage->description = 'Просмотр админки';
        $auth->add($viewAdminPage);

        $auth->addChild($admin, $viewAdminPage);

        $auth->assign($admin, 1);
    }
}