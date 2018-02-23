<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\StaffTransfer */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="staff-transfer-form">


    <?php $form = ActiveForm::begin(); ?>


    <?= $form->field($model, 'original_position')->textInput(['maxlength' => true,'value'=>Yii::$app->request->get('position'),'readonly'=>'readonly']) ?>

    <div class="form-group field-stafftransfer-now_position has-success">
        <label class="control-label" for="stafftransfer-now_position">目前职位</label>
        <select id="stafftransfer-now_position" class="form-control" name="StaffTransfer[now_position]" aria-invalid="false">
            <?php
            if(isset($position)){
                foreach($position as $value){
                    if($value['name']==$model->now_position)
                        echo '<option value="'.$value['name'].'" selected>'.$value['name'].'</option>';
                    else
                        echo '<option value="'.$value['name'].'">'.$value['name'].'</option>';
                }
            }
            ?>
        </select>

        <div class="help-block"></div>
    </div>

    <?= $form->field($model, 'reason')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'create_time')->textInput(['value'=>isset($model->create_time)?$model->create_time:''],'date') ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '创建' : '更新', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>


    <?php ActiveForm::end(); ?>

</div>
