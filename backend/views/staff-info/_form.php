<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\StaffInfo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="staff-info-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_card')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'age')->textInput() ?>

    <?= $form->field($model, 'position')->dropDownList([''=>'','校长'=>'校长','人事处'=>'人事处','教师'=>'教师','职工'=>'职工']) ?>

    <?= $form->field($model, 'sex')->dropDownList(['男'=>'男','女'=>'女']) ?>

    <?= $form->field($model, 'pay')->textInput() ?>

    <?= $form->field($model, 'create_date')->textInput([],'date') ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '创建职工档案' : '更新', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

