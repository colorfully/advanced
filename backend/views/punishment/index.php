<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '奖惩信息列表';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="punishment-index">



    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'user_id',
            'staff_info_id',
            'title',
            'create_time',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
