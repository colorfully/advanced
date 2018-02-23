<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\AsssessmentStandard */

$this->title = '考核标准';
$this->params['breadcrumbs'][] = ['label' => '考核标准', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="asssessment-standard-view">


    <p>
        <?= Html::a('修改', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
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
            'title',
            'content:ntext',
            'create_time',
        ],
    ]) ?>

</div>
