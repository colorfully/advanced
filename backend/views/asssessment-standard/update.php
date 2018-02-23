<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AsssessmentStandard */

$this->title = '修改考核标准: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => '考核标准', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '更新';
?>
<div class="asssessment-standard-update">

    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
