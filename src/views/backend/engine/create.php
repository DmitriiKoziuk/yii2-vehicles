<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model DmitriiKoziuk\yii2Vehicles\entities\Engine */

$this->title = Yii::t('app', 'Create Engine');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Engines'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="engine-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
