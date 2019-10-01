<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use DmitriiKoziuk\yii2Vehicles\entities\EngineManufacture;

/* @var $this yii\web\View */
/* @var $model DmitriiKoziuk\yii2Vehicles\entities\EngineManufacture */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Engine Manufactures'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="engine-manufacture-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'vehicle_brand_id',
            [
                'attribute' => 'vehicle_brand_id',
                'label' => 'Vehicle brand',
                'value' => function ($entity) {
                    /** @var $entity EngineManufacture */
                    return $entity->vehicleBrand->name ?? null;
                },
            ],
        ],
    ]) ?>

</div>
