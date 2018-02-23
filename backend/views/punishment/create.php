<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Punishment */

$this->title = '添加奖惩信息';
$this->params['breadcrumbs'][] = ['label' => '奖惩信息管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="punishment-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
