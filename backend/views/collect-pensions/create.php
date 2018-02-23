<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\CollectPensions */

$this->title = 'Create Collect Pensions';
$this->params['breadcrumbs'][] = ['label' => 'Collect Pensions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="collect-pensions-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
