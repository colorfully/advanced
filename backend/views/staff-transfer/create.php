<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\StaffTransfer */

$this->title = 'Create Staff Transfer';
$this->params['breadcrumbs'][] = ['label' => 'Staff Transfers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="staff-transfer-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model, 'position'=>$position
    ]) ?>

</div>
