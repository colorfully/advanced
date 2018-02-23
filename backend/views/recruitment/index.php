<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '高校招聘列表';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="recruitment-index">


    <p>
        <?= Html::a('创建招聘信息', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'introducer',
            'company',
            'address',
             'phone',
             'create_time',
             'deadline',
             'method',
             'school_location',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
