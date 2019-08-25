<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Product', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
//            'category_id',
            [
                'attribute' => 'category_id',
                'value' => function ($model) {
                    return $model->category->name;
                }
            ],
            'name',
//            'content:ntext',
            'price',
            [
                'attribute' => 'hit',
                'format' => 'raw',
                'value' => function ($model) {
                    return !$model->hit ? '<span class="text-danger">Нет</span>' : '<span class="text-success">Да</span>';
                }
            ],
            [
                'attribute' => 'new',
                'format' => 'raw',
                'value' => function ($model) {
                    return !$model->new ? '<span class="text-danger">Нет</span>' : '<span class="text-success">Да</span>';
                }
            ],
            [
                'attribute' => 'sale',
                'format' => 'raw',
                'value' => function ($model) {
                    return !$model->sale ? '<span class="text-danger">Нет</span>' : '<span class="text-success">Да</span>';
                }
            ],
            //'keywords',
            //'description',
            //'img',
//            'hit',
//            'new',
//            'sale',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
