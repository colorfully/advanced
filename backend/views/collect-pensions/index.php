<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '养老金记录';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="collect-pensions-index">


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'user_id',
            'salary',
            'refer_pension',
            'create_time',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
