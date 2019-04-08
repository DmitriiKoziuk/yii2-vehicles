<?php

namespace DmitriiKoziuk\yii2Vehicles\controllers\backend;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use DmitriiKoziuk\yii2Base\helpers\UrlHelper;
use DmitriiKoziuk\yii2Vehicles\entities\Brand;
use DmitriiKoziuk\yii2Vehicles\entities\Model;
use DmitriiKoziuk\yii2Vehicles\entities\Vehicle;
use DmitriiKoziuk\yii2Vehicles\entities\VehicleSearch;

/**
 * VehicleController implements the CRUD actions for Vehicle model.
 */
class VehicleController extends Controller
{
    /**
     * @var UrlHelper
     */
    private $_urlHelper;

    public function __construct(
        $id,
        $module,
        UrlHelper $urlHelper,
        $config = []
    ) {
        parent::__construct($id, $module, $config);
        $this->_urlHelper = $urlHelper;
    }

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
     * Lists all Vehicle models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new VehicleSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Vehicle model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Vehicle model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Vehicle();

        if ($model->load(Yii::$app->request->post())) {
            /** @var Brand $vehicleBrand */
            $vehicleBrand = Brand::find()->where(['id' => $model->brand_id])->one();
            /** @var Model $vehicleModel */
            $vehicleModel = Model::find()->where(['id' => $model->model_id])->one();
            $slug = $vehicleBrand->name .
                ' ' .
                $vehicleModel->name .
                ' ' .
                $model->chassis_code .
                ' ' .
                $model->sub_model_name;
            $model->slug = $this->_urlHelper::getSlugFromString($slug);
            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Vehicle model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            /** @var Brand $vehicleBrand */
            $vehicleBrand = Brand::find()->where(['id' => $model->brand_id])->one();
            /** @var Model $vehicleModel */
            $vehicleModel = Model::find()->where(['id' => $model->model_id])->one();
            $slug = $vehicleBrand->name .
                ' ' .
                $vehicleModel->name .
                ' ' .
                $model->chassis_code .
                ' ' .
                $model->sub_model_name;
            $model->slug = $this->_urlHelper::getSlugFromString($slug);
            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Vehicle model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Vehicle model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Vehicle the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Vehicle::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
