<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\GetPension */

$this->title = 'Create Get Pension';
$this->params['breadcrumbs'][] = ['label' => 'Get Pensions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="get-pension-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
