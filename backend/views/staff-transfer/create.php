<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\StaffTransfer */

$this->title = '调动职工职位';
$this->params['breadcrumbs'][] = ['label' => '调动职工列表', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="staff-transfer-create">



    <?= $this->render('_form', [
        'model' => $model, 'position'=>$position
    ]) ?>

</div>
