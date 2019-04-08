<?php

namespace DmitriiKoziuk\yii2Vehicles\controllers\backend;

use Yii;
use DmitriiKoziuk\yii2Vehicles\entities\VehicleEngine;
use DmitriiKoziuk\yii2Vehicles\entities\VehicleEngineSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * VehicleEngineController implements the CRUD actions for VehicleEngine model.
 */
class VehicleEngineController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all VehicleEngine models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new VehicleEngineSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single VehicleEngine model.
     * @param integer $vehicle_id
     * @param integer $engine_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($vehicle_id, $engine_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($vehicle_id, $engine_id),
        ]);
    }

    /**
     * Creates a new VehicleEngine model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new VehicleEngine();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'vehicle_id' => $model->vehicle_id, 'engine_id' => $model->engine_id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing VehicleEngine model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $vehicle_id
     * @param integer $engine_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($vehicle_id, $engine_id)
    {
        $model = $this->findModel($vehicle_id, $engine_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'vehicle_id' => $model->vehicle_id, 'engine_id' => $model->engine_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing VehicleEngine model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $vehicle_id
     * @param integer $engine_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($vehicle_id, $engine_id)
    {
        $this->findModel($vehicle_id, $engine_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the VehicleEngine model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $vehicle_id
     * @param integer $engine_id
     * @return VehicleEngine the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($vehicle_id, $engine_id)
    {
        if (($model = VehicleEngine::findOne(['vehicle_id' => $vehicle_id, 'engine_id' => $engine_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
