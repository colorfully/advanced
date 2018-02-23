<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Recruitment */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="recruitment-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'company')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'create_time')->textInput([],'date') ?>

    <?= $form->field($model, 'deadline')->textInput([],'date') ?>

    <?= $form->field($model, 'method')->dropDownList(['0'=>'请选择招聘方式','网上投递简历'=>'网上投递简历','学校摆摊'=>'学校摆摊'])  ?>

    <?= $form->field($model, 'school_location')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['padding_top'=>'10px'],'email') ?>

    <?= $form->field($model, 'content')->widget(\yii\redactor\widgets\Redactor::className(), [
        'clientOptions' => [
            'imageManagerJson' => ['/redactor/upload/image-json'],
            'imageUpload' => ['/redactor/upload/image'],
            'fileUpload' => ['/redactor/upload/file'],
            'lang' => 'zh_cn',
            'plugins' => ['clips', 'fontcolor','imagemanager']
        ]
    ]) ?>



    <div class="form-group" style="margin-top: 42px">
        <?= Html::submitButton($model->isNewRecord ? '创建' : '更新', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
