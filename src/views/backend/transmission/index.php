<?php

use yii\helpers\Html;
use yii\grid\GridView;
use DmitriiKoziuk\yii2Vehicles\entities\Transmission;

/* @var $this yii\web\View */
/* @var $searchModel DmitriiKoziuk\yii2Vehicles\entities\TransmissionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Transmissions');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="transmission-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Transmission'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'series',
            [
                'attribute' => 'Transmission manufacture',
                'content' => function ($entity) {
                    /** @var $entity Transmission */
                    return $entity->transmissionManufacture->name;
                }
            ],
            'type',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
