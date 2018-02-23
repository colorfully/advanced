<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\CollectPensions */

$this->title = '提交养老金记录';
$this->params['breadcrumbs'][] = ['label' => '养老金管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="collect-pensions-view">


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
            'salary',
            'refer_pension',
            'create_time',
        ],
    ]) ?>

</div>
