<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model DmitriiKoziuk\yii2Vehicles\entities\Engine */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="engine-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'engine_manufacture_id')->textInput() ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'series')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fuel_type')->dropDownList([ 'petrol' => 'Petrol', 'diesel' => 'Diesel', 'electric' => 'Electric', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'power_kw')->textInput() ?>

    <?= $form->field($model, 'torque')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
