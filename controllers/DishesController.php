<?php

namespace app\controllers;

use app\models\Dishes;
use app\models\forms\DishForm;
use Yii;
use yii\base\InvalidConfigException;
use yii\base\InvalidRouteException;
use yii\data\ActiveDataProvider;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DishesController implements the CRUD actions for Dishes model.
 */
class DishesController extends BaseController
{
    /**
     * @inheritDoc
     */
    public function behaviors(): array
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Dishes models.
     *
     * @return string
     */
    public function actionIndex(): string
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Dishes::find(),
            /*
            'pagination' => [
                'pageSize' => 50
            ],
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_DESC,
                ]
            ],
            */
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'suffix'=>$this->suffix,
        ]);
    }

    /**
     * Displays a single Dishes model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id): string
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
            'suffix'=>$this->suffix,
        ]);
    }

    /**
     * Creates a new Dishes model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     * @throws InvalidConfigException
     * @throws InvalidRouteException
     */
    public function actionCreate()
    {
//        $model = new DishForm();
//
//        if ($this->request->isPost) {
//            if ($model->load($this->request->post()) && $model->save()) {
//                return $this->redirect(['view', 'id' => $model->id]);
//            }
//        } else {
//            $model->loadData(null);
//        }
//
//        return $this->render('create', [
//            'model' => $model,
//            'suffix'=>$this->suffix,
//        ]);

        $model = Yii::createObject( DishForm::class);
        $model->loadData(null);
        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {

                if ($model->save()) {
                    return $this->redirect(['view', 'id' => $model->id]);
                }
            }
        } else {
            $model->loadData(null);
        }



        return $this->render('create', [
            'model' => $model,
            'suffix'=>$this->suffix,
        ]);
    }

    /**
     * Updates an existing Dishes model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     * @throws InvalidConfigException
     */
    public function actionUpdate($id)
    {

        $dish = $this->findModel($id);
        $model = Yii::createObject(DishForm::class);
        $model->loadData($dish);
        if (\Yii::$app->request->isPost){
            $model->attributes = \Yii::$app->request->post('DishForm');
            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }
        else {
            $model->loadData(null);
        }


        return $this->render('create', [
            'model' => $model,
            'suffix'=>$this->suffix,
        ]);
    }

    /**
     * Deletes an existing Dishes model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Dishes model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Dishes the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Dishes::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }

}
