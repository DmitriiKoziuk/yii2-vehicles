<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model DmitriiKoziuk\yii2Vehicles\entities\Vehicle */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="vehicle-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'type')->dropDownList([ 'car' => 'Car', 'motorcycle' => 'Motorcycle', 'atv' => 'Atv', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'brand_id')->textInput() ?>

    <?= $form->field($model, 'model_id')->textInput() ?>

    <?= $form->field($model, 'transmissions_id')->textInput() ?>

    <?= $form->field($model, 'chassis_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sub_model_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'generation')->textInput() ?>

    <?= $form->field($model, 'drive_wheel')->dropDownList([ 'front' => 'Front', 'rear' => 'Rear', 'four' => 'Four', 'all' => 'All', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'manufacture_start_date')->textInput() ?>

    <?= $form->field($model, 'manufacture_end_date')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
