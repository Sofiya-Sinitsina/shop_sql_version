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

        $super_admin = $auth->createRole('super_admin');
        $auth->add($super_admin);

        $viewAdminPage = $auth->createPermission('viewAdminPage');
        $viewAdminPage->description = 'Просмотр админки';
        $auth->add($viewAdminPage);

        $changeRoles = $auth->createPermission('changeRoles');
        $changeRoles->description = 'Изменить роли';
        $auth->add($changeRoles);

        $auth->addChild($admin, $viewAdminPage);
        $auth->addChild($super_admin, $changeRoles);

//        $auth->assign($admin, 1);

        $users = \app\models\Users::find()->all();
        foreach ($users as $user) {
            if ($user->role === 'admin') {
                $auth->assign($admin, $user->id);
            }
            elseif ($user->role === 'super_admin') {
                $auth->assign($super_admin, $user->id);
            }
        }
    }
}