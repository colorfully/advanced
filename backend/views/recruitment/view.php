<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Recruitment */

$this->title = $model->company.'招聘创建成功';
$this->params['breadcrumbs'][] = ['label' => '招聘系统', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="recruitment-view">


    <p>
        <?= Html::a('更新', ['Update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('删除', ['Delete', 'id' => $model->id], [
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
            'introducer',
            'company',
            'address',
            'content:html',
            'phone',
            'create_time',
            'deadline',
            'method',
            'school_location',
        ],
    ]) ?>

</div>
