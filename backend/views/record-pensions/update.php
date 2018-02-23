<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\RecordPensions */

$this->title = 'Update Record Pensions: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Record Pensions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="record-pensions-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
