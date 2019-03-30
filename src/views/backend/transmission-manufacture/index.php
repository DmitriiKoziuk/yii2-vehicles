<?php

use yii\helpers\Html;
use yii\grid\GridView;
use DmitriiKoziuk\yii2Vehicles\entities\TransmissionManufacture;

/* @var $this yii\web\View */
/* @var $searchModel DmitriiKoziuk\yii2Vehicles\entities\TransmissionManufactureSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Transmission Manufactures');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="transmission-manufacture-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Transmission Manufacture'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            [
                'attribute' => 'vehicle_brand_id',
                'label' => 'Vehicle brand',
                'content' => function ($entity) {
                    /** @var $entity TransmissionManufacture */
                    return empty($entity->vehicleBrand) ? null : $entity->vehicleBrand->name;
                }
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
