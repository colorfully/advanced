<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\StaffTransfer */

$this->title = '调动职工: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => '职工调动', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '更新';
?>
<div class="staff-transfer-update">


    <?= $this->render('_form', [
        'model' => $model,
        'position' => $position
    ]) ?>

</div>
