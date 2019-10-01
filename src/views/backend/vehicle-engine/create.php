<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model DmitriiKoziuk\yii2Vehicles\entities\VehicleEngine */

$this->title = Yii::t('app', 'Create Vehicle Engine');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Vehicle Engines'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vehicle-engine-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
