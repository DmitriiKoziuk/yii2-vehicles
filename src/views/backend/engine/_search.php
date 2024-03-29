<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model DmitriiKoziuk\yii2Vehicles\entities\EngineSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="engine-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'engine_manufacture_id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'series') ?>

    <?= $form->field($model, 'fuel_type') ?>

    <?php // echo $form->field($model, 'power_kw') ?>

    <?php // echo $form->field($model, 'torque') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
