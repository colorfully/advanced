<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\Assessment */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '职工考核';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="assessment-index">


<!--    --><?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'user_id',
            'evaluation',
            'average_score',
             'create_time',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
