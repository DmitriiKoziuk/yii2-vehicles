<?php

use yii\helpers\Html;
use yii\grid\GridView;
use DmitriiKoziuk\yii2Vehicles\entities\VehicleEngine;

/* @var $this yii\web\View */
/* @var $searchModel DmitriiKoziuk\yii2Vehicles\entities\VehicleEngineSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Vehicle Engines');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vehicle-engine-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Vehicle Engine'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'Vehicle',
                'content' => function ($entity) {
                    /** @var $entity VehicleEngine */
                    return $entity->vehicle->brand->name . ' ' . $entity->vehicle->model->name;
                },
            ],
            [
                'attribute' => 'Engine',
                'content' => function ($entity) {
                    /** @var $entity VehicleEngine */
                    return $entity->engine->engineManufacture->name . ' ' . $entity->engine->name;
                },
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
