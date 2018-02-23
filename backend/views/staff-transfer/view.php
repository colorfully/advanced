<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\StaffTransfer */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => '职工调动', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="staff-transfer-view">



    <p>
        <?= Html::a('更新', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('删除', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '确定删除该记录',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'user_id',
            'original_position',
            'now_position',
            'reason',
            'create_time',
        ],
    ]) ?>

</div>
