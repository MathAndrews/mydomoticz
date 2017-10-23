<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Events';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="event-index">

  <h1><?= Html::encode($this->title) ?></h1>

  <p>
      <?= Html::a('Create Event', ['create'], ['class' => 'btn btn-success']) ?>
  </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            [
                'attribute' => 'name',
                'value' => 'module.name',
                'enableSorting' => true
            ],
            [
                'attribute' => 'status',
                'value' => function ($model, $key, $index, $column) {
                    return $model->status ? 'enabled' : 'disabled';
                }
            ],
            'type',
            'date:date',
            'time:time',
            // 'randomness',
            // 'command',
            'days:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
