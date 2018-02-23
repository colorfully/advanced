<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\AssessmentLog */

$this->title = 'Create Assessment Log';
$this->params['breadcrumbs'][] = ['label' => 'Assessment Logs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="assessment-log-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
