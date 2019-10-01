<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model DmitriiKoziuk\yii2Vehicles\entities\TransmissionManufacture */

$this->title = Yii::t('app', 'Create Transmission Manufacture');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Transmission Manufactures'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="transmission-manufacture-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
