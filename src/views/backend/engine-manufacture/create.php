<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model DmitriiKoziuk\yii2Vehicles\entities\EngineManufacture */

$this->title = Yii::t('app', 'Create Engine Manufacture');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Engine Manufactures'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="engine-manufacture-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
