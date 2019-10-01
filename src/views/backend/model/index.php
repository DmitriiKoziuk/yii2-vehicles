<?php

use yii\web\View;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;
use DmitriiKoziuk\yii2Vehicles\entities\ModelSearch;
use DmitriiKoziuk\yii2Vehicles\entities\Model;

/**
 * @var $this View
 * @var $searchModel ModelSearch
 * @var $dataProvider ActiveDataProvider
 */

$this->title = Yii::t('app', 'Models');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="model-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Model'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute' => 'brand_id',
                'label' => 'Brand',
                'content' => function ($entity) {
                    /** @var $entity Model */
                    return $entity->brand->name;
                }
            ],
            'name',
            'slug',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
