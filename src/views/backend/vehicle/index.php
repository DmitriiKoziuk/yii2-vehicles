<?php

use yii\helpers\Html;
use yii\grid\GridView;
use DmitriiKoziuk\yii2Vehicles\entities\Vehicle;

/* @var $this yii\web\View */
/* @var $searchModel DmitriiKoziuk\yii2Vehicles\entities\VehicleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Vehicles');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vehicle-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Vehicle'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'type',
            'slug',
            [
                'attribute' => 'Brand',
                'content' => function ($entity) {
                    /** @var $entity Vehicle */
                    return $entity->brand->name;
                },
            ],
            [
                'attribute' => 'Model',
                'content' => function ($entity) {
                    /** @var $entity Vehicle */
                    return $entity->model->name;
                },
            ],
            [
                'attribute' => 'Transmission',
                'content' => function ($entity) {
                    /** @var $entity Vehicle */
                    return $entity->transmissions->name ?? null;
                },
            ],
            'chassis_code',
            'sub_model_name',
            'generation',
            'drive_wheel',
            'manufacture_start_date',
            'manufacture_end_date',
            'created_at:datetime',
            'updated_at:datetime',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
