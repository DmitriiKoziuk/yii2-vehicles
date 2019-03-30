<?php
namespace DmitriiKoziuk\yii2Vehicles\controllers\backend;

use yii\web\Controller;

class VehiclesController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
}