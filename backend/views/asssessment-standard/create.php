<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\AsssessmentStandard */

$this->title = '创建考核标准';
$this->params['breadcrumbs'][] = ['label' => '考核标准', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="asssessment-standard-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
