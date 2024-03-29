<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use DmitriiKoziuk\yii2Vehicles\entities\Model;

/* @var $this yii\web\View */
/* @var $model DmitriiKoziuk\yii2Vehicles\entities\Model */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Models'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="model-view">

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
            'brand_id',
            [
                'attribute' => 'brand_id',
                'label' => 'Brand',
                'value' => function ($entity) {
                    /** @var $entity Model */
                    return $entity->brand->name;
                }
            ],
            'slug',
        ],
    ]) ?>

</div>
