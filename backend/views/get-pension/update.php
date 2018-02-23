<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\GetPension */

$this->title = '修改领取养老金记录 ';
$this->params['breadcrumbs'][] = ['label' => '领取养老金列表', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '更新';
?>
<div class="get-pension-update">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
