<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\StaffInfo */

$this->title = '更新职工档案: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => '教职工管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '更新';
?>
<div class="staff-info-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
