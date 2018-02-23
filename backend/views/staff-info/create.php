<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\StaffInfo */

$this->title = '填写完整的职工档案';
$this->params['breadcrumbs'][] = ['label' => '教职工管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="staff-info-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
