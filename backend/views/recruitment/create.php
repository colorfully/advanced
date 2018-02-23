<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Recruitment */

$this->title = '建立企业招聘信息';
$this->params['breadcrumbs'][] = ['label' => 'Recruitments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="recruitment-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
