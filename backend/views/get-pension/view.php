<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\GetPension */

$this->title = '领取养老金记录';
$this->params['breadcrumbs'][] = ['label' => '领取养老金列表', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="get-pension-view">


    <p>
        <?= Html::a('更新', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('删除', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '确定删除?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'user_id',
            'get_pension',
            'create_time',
        ],
    ]) ?>

</div>
