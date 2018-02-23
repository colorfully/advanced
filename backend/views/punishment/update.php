<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Punishment */

$this->title = '更新奖惩信息: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => '奖惩信息管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '更新奖惩信息';
?>
<div class="punishment-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
