<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper; 
use app\models\LookupRole;
/* @var $this yii\web\View */
/* @var $model app\models\ArsUser */
/* @var $form yii\widgets\ActiveForm */
$role = ArrayHelper::map(LookupRole::find()->asArray()->all(),'id','role'); //retrieve data from table look_up_pendapatan

?>
<?php $form = ActiveForm::begin(); ?>
<?= $form->errorSummary($model,['class'=>'alert alert-danger','header'=>'']); ?>
<div class="row">
    <div class="portlet-body form">
        <div class="form-body">
            <div class='col-md-6'>
                <div class="form-group form-md-line-input">
                    <?= Html::activeTextInput($model,'user_name',['class'=>'form-control','id'=>'form_control_1']); ?>
                        <label for="form_control_1"><?= Html::activeLabel($model,'user_name'); ?> <span class="required">*</span></label>
                        <span class="help-block"><?= Html::error($model,'user_name'); ?></span>
                </div>
            </div>
            <div class='col-md-6'>
                <div class="form-group form-md-line-input">
                    <?= Html::activeDropDownList($model, 'role', $role, 
                            [
                                'prompt'=>'',
                                'class'=>'form-control',

                            ]); ?>
                            <label for="form_control_1"><?= Html::activeLabel($model,'role'); ?></label>
                            <span class="help-block"><?= Html::error($model,'role'); ?></span>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="portlet-body form">
        <div class="form-body">
            <div class='col-md-6'>
                <div class="form-group form-md-line-input">
                    <?= Html::activeTextInput($model,'user_icno',['class'=>'form-control','id'=>'form_control_1']); ?>
                        <label for="form_control_1"><?= Html::activeLabel($model,'user_icno'); ?> <span class="required">*</span></label>
                        <span class="help-block"><?= Html::error($model,'user_icno'); ?></span>
                </div>
            </div>
            <div class='col-md-6'>
                <div class="form-group form-md-line-input">
                    <?= Html::activeTextInput($model,'user_phone',['class'=>'form-control','id'=>'form_control_1']); ?>
                        <label for="form_control_1"><?= Html::activeLabel($model,'user_phone'); ?></label>
                        <span class="help-block"><?= Html::error($model,'user_phone'); ?></span>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="portlet-body form">
        <div class="form-body">
            <div class='col-md-12'>
                <div class="form-group form-md-line-input">
                    <?= Html::activeTextArea($model,'user_address',['class'=>'form-control','id'=>'form_control_1','rows'=>'3']); ?>
                        <label for="form_control_1"><?= Html::activeLabel($model,'user_address'); ?></label>
                        <span class="help-block"><?= Html::error($model,'user_address'); ?></span>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="portlet-body form">
        <div class="form-body">
            <div class='col-md-6'>
                <div class="form-group form-md-line-input">
                    <?= Html::activeTextInput($model,'user_email',['class'=>'form-control','id'=>'form_control_1']); ?>
                        <label for="form_control_1"><?= Html::activeLabel($model,'user_email'); ?><span class="required">*</span></label>
                        <span class="help-block"><?= Html::error($model,'user_email'); ?></span>
                </div>
            </div>
            <div class='col-md-6'>
                <div class="form-group form-md-line-input">
                    <?= Html::activeTextInput($model,'user_nickname',['class'=>'form-control','id'=>'form_control_1']); ?>
                        <label for="form_control_1"><?= Html::activeLabel($model,'user_nickname'); ?><span class="required">*</span></label>
                        <span class="help-block"><?= Html::error($model,'user_nickname'); ?></span>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Submit' : 'Update', ['class' => $model->isNewRecord ? 'btn green-meadow' : 'btn btn-primary']) ?>
        <?= Html::a('Cancel',['ars-user/index'],['class'=>'btn btn-default'])?>
    </div>
<?php ActiveForm::end(); ?>

