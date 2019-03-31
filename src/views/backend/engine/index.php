<?php

use yii\helpers\Html;
use yii\grid\GridView;
use DmitriiKoziuk\yii2Vehicles\entities\Engine;

/* @var $this yii\web\View */
/* @var $searchModel DmitriiKoziuk\yii2Vehicles\entities\EngineSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Engines');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="engine-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Engine'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute' => 'Manufacture',
                'content' => function ($entity) {
                    /** @var $entity Engine */
                    return $entity->engineManufacture->name;
                }
            ],
            'name',
            'series',
            'fuel_type',
            'power_kw',
            'torque',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
