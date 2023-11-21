<?php

namespace app\controllers;

use app\models\TbCargo;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TbCargoController implements the CRUD actions for TbCargo model.
 */
class TbCargoController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
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
     * Lists all TbCargo models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => TbCargo::find(),
            /*
            'pagination' => [
                'pageSize' => 50
            ],
            'sort' => [
                'defaultOrder' => [
                    'cargo_id' => SORT_DESC,
                ]
            ],
            */
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TbCargo model.
     * @param int $cargo_id Cargo ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($cargo_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($cargo_id),
        ]);
    }

    /**
     * Creates a new TbCargo model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new TbCargo();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'cargo_id' => $model->cargo_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing TbCargo model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $cargo_id Cargo ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($cargo_id)
    {
        $model = $this->findModel($cargo_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'cargo_id' => $model->cargo_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing TbCargo model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $cargo_id Cargo ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($cargo_id)
    {
        $this->findModel($cargo_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the TbCargo model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $cargo_id Cargo ID
     * @return TbCargo the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($cargo_id)
    {
        if (($model = TbCargo::findOne(['cargo_id' => $cargo_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
