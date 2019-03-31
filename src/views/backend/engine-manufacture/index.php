<?php

use yii\helpers\Html;
use yii\grid\GridView;
use DmitriiKoziuk\yii2Vehicles\entities\EngineManufacture;

/* @var $this yii\web\View */
/* @var $searchModel DmitriiKoziuk\yii2Vehicles\entities\EngineManufactureSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Engine Manufactures');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="engine-manufacture-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Engine Manufacture'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            [
                'attribute' => 'Vehicle brand',
                'content' => function ($entity) {
                    /** @var $entity EngineManufacture */
                    return $entity->vehicleBrand->name ?? null;
                },
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
