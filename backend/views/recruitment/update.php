<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Recruitment */

$this->title = '更新招聘信息 ' ;
$this->params['breadcrumbs'][] = ['label' => '招聘管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '更新';
?>
<div class="recruitment-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
