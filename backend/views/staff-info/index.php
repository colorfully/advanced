<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '职工档案';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="staff-info-index">



    <p>
        <a class="btn btn-success" href="/advanced/backend/web/index.php?r=admin/user/signup">创建职工档案</a>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'name',
            'address',
            'phone',
             'id_card',
             'age',
             'position',
             'sex',
             'pay',
             'create_date',
            [
                'class' => 'yii\grid\ActionColumn',
                'header'=>'操作',
                'template'=>'{add}{view}{update}{delete}{punishment}{move}',
                'buttons' => [
                    'punishment' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-list"></span>', '/advanced/backend/web/index.php?r=punishment/create&id=' . $model->user_id . '&staff_id=' . $model->id, [
                            'title' => Yii::t('app', '惩罚')
                        ]);
                    },
                    'move' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-list"></span>', '/advanced/backend/web/index.php?r=staff-transfer/create&id=' . $model->user_id . '&staff_id=' . $model->id.'&position='.$model->position, [
                            'title' => Yii::t('app', '调动')
                        ]);
                    }
                ],

               'headerOptions' => ['width' => '180']
            ],

        ],
    ]); ?>
</div>
