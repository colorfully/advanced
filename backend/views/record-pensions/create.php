<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\RecordPensions */

$this->title = 'Create Record Pensions';
$this->params['breadcrumbs'][] = ['label' => 'Record Pensions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="record-pensions-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
