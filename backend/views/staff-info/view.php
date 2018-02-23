<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\StaffInfo */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => '教职工列表', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="staff-info-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('修改', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('删除', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'user_id',
            'name',
            'address',
            'phone',
            'id_card',
            'age',
            'position',
            'sex',
            'pay',
            'create_date',
        ],
    ]) ?>

</div>
