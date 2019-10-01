<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model DmitriiKoziuk\yii2Vehicles\entities\VehicleEngine */

$this->title = Yii::t('app', 'Update Vehicle Engine: {name}', [
    'name' => $model->vehicle_id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Vehicle Engines'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->vehicle_id, 'url' => ['view', 'vehicle_id' => $model->vehicle_id, 'engine_id' => $model->engine_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="vehicle-engine-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
