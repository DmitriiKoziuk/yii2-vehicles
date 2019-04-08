<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use DmitriiKoziuk\yii2Vehicles\entities\Vehicle;

/* @var $this yii\web\View */
/* @var $model Vehicle */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Vehicles'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="vehicle-view">

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
            'slug',
            'type',
            'brand_id',
            [
                'attribute' => 'brand_id',
                'label' => 'Brand',
                'value' => function ($entity) {
                    /** @var $entity Vehicle */
                    return $entity->brand->name ?? null;
                },
            ],
            'model_id',
            [
                'attribute' => 'model_id',
                'label' => 'Model',
                'value' => function ($entity) {
                    /** @var $entity Vehicle */
                    return $entity->model->name ?? null;
                },
            ],
            'transmissions_id',
            [
                'attribute' => 'transmissions_id',
                'label' => 'Transmission',
                'value' => function ($entity) {
                    /** @var $entity Vehicle */
                    return $entity->transmissions->name ?? null;
                },
            ],
            'chassis_code',
            'sub_model_name',
            'generation',
            'drive_wheel',
            'manufacture_start_date:datetime',
            'manufacture_end_date:datetime',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
