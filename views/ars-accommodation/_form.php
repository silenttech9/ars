<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use app\models\LookupArea;
use app\models\LookupAccommodation;
use yii\helpers\ArrayHelper; 
use wbraganca\dynamicform\DynamicFormWidget;
/* @var $this yii\web\View */
/* @var $model app\models\ArsAccommodation */
/* @var $form yii\widgets\ActiveForm */
 

$area = ArrayHelper::map(LookupArea::find()->asArray()->orderBy(['id'=>SORT_ASC])->all(),'id','seksyen_area'); //retrieve data from table lookup_area
$type_flat = ArrayHelper::map(LookupAccommodation::find()->asArray()->orderBy(['type_name'=>SORT_ASC])->all(),'id','type_name'); //retrieve data from table LookupAccommodation

$js = '
jQuery(".dynamicform_wrapper").on("afterInsert", function(e, item) {
    jQuery(".dynamicform_wrapper .panel-title-address").each(function(index) {
        jQuery(this).html("Gambar: " + (index + 1))
    });
});

jQuery(".dynamicform_wrapper").on("afterDelete", function(e) {
    jQuery(".dynamicform_wrapper .panel-title-address").each(function(index) {
        jQuery(this).html("Gambar: " + (index + 1))
    });
});

';

$this->registerJs($js);
?>


    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data','id' => 'dynamic-form']]); ?>
<div class="form-wizard">
    <div class="form-body">
        <ul class="nav nav-pills nav-justified steps">
            <li>
                <a href="#tab1" data-toggle="tab" class="step">
                <span class="number">
                1 </span>
                <span class="desc">
                <i class="fa fa-check"></i>Accommodation Info </span>
                </a>
            </li>
            <li>
                <a href="#tab2" data-toggle="tab" class="step">
                <span class="number">
                2 </span>
                <span class="desc">
                <i class="fa fa-check"></i> Upload Image </span>
                </a>
            </li>

        </ul>
        <div id="bar" class="progress progress-striped" role="progressbar">
            <div class="progress-bar progress-bar-success">
            </div>
        </div>
        <div class="tab-content">
            
            <div class="tab-pane active" id="tab1">
                <?= $form->errorSummary($model,['class'=>'alert alert-danger','header'=>'']); ?>
                <div class="row">
                    <div class="portlet-body form">
                        <div class="form-body">
                            <div class='col-md-12'>
                                <div class="form-group form-md-line-input form-md-floating-label">
                                    <?= Html::activeTextInput($model,'acc_title',['class'=>'form-control','id'=>'form_control_1']); ?>
                                        <label for="form_control_1"><?= Html::activeLabel($model,'acc_title'); ?> <span class="required">*</span></label>
                                        <span class="help-block"><?= Html::error($model,'acc_title'); ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="portlet-body form">
                        <div class="form-body">
                            <div class='col-md-4'>
                                <div class="form-group form-md-line-input">
                                    <?= Html::activeTextInput($model,'acc_state',['class'=>'form-control','value'=>'Selangor','disabled'=>'']); ?>
                                        <label for="form_control_1"><?= Html::activeLabel($model,'acc_state'); ?></label>
                                        <span class="help-block"><?= Html::error($model,'acc_state'); ?></span>
                                </div>
                            </div>
                            <div class='col-md-4'>
                                <div class="form-group form-md-line-input">
                                    <?= Html::activeTextInput($model,'acc_city',['class'=>'form-control','value'=>'Shah Alam','disabled'=>'']); ?>
                                        <label for="form_control_1"><?= Html::activeLabel($model,'acc_city'); ?></label>
                                        <span class="help-block"><?= Html::error($model,'acc_city'); ?></span>
                                </div>
                            </div>
                            <div class='col-md-4'>
                                <div class="form-group form-md-line-input form-md-floating-label">
                                    <?= Html::activeTextInput($model,'acc_postcode',['class'=>'form-control','id'=>'form_control_1']); ?>
                                        <label for="form_control_1"><?= Html::activeLabel($model,'acc_postcode'); ?></label>
                                        <span class="help-block"><?= Html::error($model,'acc_postcode'); ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="portlet-body form">
                        <div class="form-body">
                            <div class='col-md-12'>
                                <div class="form-group form-md-line-input form-md-floating-label">
                                    <?= Html::activeTextArea($model,'acc_address',['class'=>'form-control','id'=>'form_control_1','rows'=>'3']); ?>
                                        <label for="form_control_1"><?= Html::activeLabel($model,'acc_address'); ?><span class="required">*</span></label>
                                        <span class="help-block"><?= Html::error($model,'acc_address'); ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="portlet-body form">
                        <div class="form-body">
                            <div class='col-md-4'>
                                <div class="form-group form-md-line-input form-md-floating-label">
                                    <?= Html::activeTextInput($model,'acc_price',['class'=>'form-control','id'=>'form_control_1']); ?>
                                        <label for="form_control_1"><?= Html::activeLabel($model,'acc_price'); ?> <span class="required">*</span></label>
                                        <span class="help-block"><?= Html::error($model,'acc_price'); ?></span>
                                </div>
                            </div>
                            <div class='col-md-4'>
                                <div class="form-group form-md-line-input form-md-floating-label">
                                    <?= Html::activeTextInput($model,'acc_bathroom',['class'=>'form-control','id'=>'form_control_1']); ?>
                                        <label for="form_control_1"><?= Html::activeLabel($model,'acc_bathroom'); ?> <span class="required">*</span></label>
                                        <span class="help-block"><?= Html::error($model,'acc_bathroom'); ?></span>
                                </div>
                            </div>
                            <div class='col-md-4'>
                                <div class="form-group form-md-line-input form-md-floating-label">
                                    <?= Html::activeTextInput($model,'acc_noRoom',['class'=>'form-control','id'=>'form_control_1']); ?>
                                        <label for="form_control_1"><?= Html::activeLabel($model,'acc_noRoom'); ?> <span class="required">*</span></label>
                                        <span class="help-block"><?= Html::error($model,'acc_noRoom'); ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="portlet-body form">
                        <div class="form-body">
                            <div class='col-md-4'>
                                <div class="form-group form-md-line-input form-md-floating-label">
                                    <?= Html::activeDropDownList($model, 'acc_preference',
                                        [
                                            'Male' => 'Male',
                                            'Female' => 'Female',
                                        ],  
                                        [
                                            'prompt'=>'',
                                            'class'=>'form-control',

                                        ]); ?>
                                        <label for="form_control_1"><?= Html::activeLabel($model,'acc_preference'); ?> <span class="required">*</span></label>
                                        <span class="help-block"><?= Html::error($model,'acc_preference'); ?></span>
                                </div>
                            </div>
                            <div class='col-md-4'>
                                <div class="form-group form-md-line-input form-md-floating-label">
                                    <?= Html::activeDropDownList($model, 'acc_seksyen', $area, 
                                        [
                                            'prompt'=>'',
                                            'class'=>'form-control',

                                        ]); ?>
                                        <label for="form_control_1"><?= Html::activeLabel($model,'acc_seksyen'); ?> <span class="required">*</span></label>
                                        <span class="help-block"><?= Html::error($model,'acc_seksyen'); ?></span>
                                </div>
                            </div>
                            <div class='col-md-4'>
                                <div class="form-group form-md-line-input form-md-floating-label">
                                    <?= Html::activeDropDownList($model, 'acc_typeAcc', $type_flat, 
                                        [
                                            'prompt'=>'',
                                            'class'=>'form-control',

                                        ]); ?>
                                        <label for="form_control_1"><?= Html::activeLabel($model,'acc_typeAcc'); ?> <span class="required">*</span></label>
                                        <span class="help-block"><?= Html::error($model,'acc_typeAcc'); ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="portlet-body form">
                        <div class="form-body">
                            <div class='col-md-12'>
                                <div class="form-group form-md-line-input form-md-floating-label">
                                    <?= Html::activeTextArea($model,'acc_description',['class'=>'form-control','id'=>'form_control_1','rows'=>'4']); ?>
                                        <label for="form_control_1"><?= Html::activeLabel($model,'acc_description'); ?><span class="required">*</span></label>
                                        <span class="help-block"><?= Html::error($model,'acc_description'); ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="portlet-body form">
                        <div class="form-body">
                            <div class='well'><strong>How to get Latitude and Longitude number ?</strong> Longitude and Latitude is for students to find your home location using GPS/Google Maps. You are recommended to use this <a href="http://www.gps-coordinates.net/" target='_BLANK'><strong>WEBSITE</strong></a> to get the longitude and latitude of the location of your rental house.</div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="portlet-body form">
                        <div class="form-body">
                            <div class='col-md-4'>
                                <div class="form-group form-md-line-input form-md-floating-label">
                                    <?= Html::activeTextInput($model,'acc_lat',['class'=>'form-control','id'=>'form_control_1']); ?>
                                        <label for="form_control_1"><?= Html::activeLabel($model,'acc_lat'); ?><span class="required">*</span></label>
                                        <span class="help-block"><?= Html::error($model,'acc_lat'); ?></span>
                                </div>
                            </div>
                            <div class='col-md-4'>
                                <div class="form-group form-md-line-input form-md-floating-label">
                                    <?= Html::activeTextInput($model,'acc_long',['class'=>'form-control','id'=>'form_control_1']); ?>
                                        <label for="form_control_1"><?= Html::activeLabel($model,'acc_long'); ?><span class="required">*</span></label>
                                        <span class="help-block"><?= Html::error($model,'acc_long'); ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="tab-pane" id="tab2">
                <div class="row">
                    <div class="portlet-body form">
                        <div class="form-body">
                            <div class='col-md-12'>
                                <div class="form-group form-md-line-input">
                                    <?= Html::activeFileInput($model,'file',['class'=>'form-control','id'=>'form_control_1']); ?>
                                        <label for="form_control_1"><?= Html::activeLabel($model,'acc_image'); ?><span class="required">*</span></label>
                                        <span class="help-block"><?= Html::error($model,'acc_image'); ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                
            </div>
            
            <br>
        </div>
    </div><!-- END form-body -->
    <div class="form-actions">
            
            <a href="javascript:;" class="btn default button-previous">
            Back </a>
            <a href="javascript:;" class="btn blue button-next">
            Continue 
            </a>
            <?= Html::submitButton($model->isNewRecord ? 'Submit' : 'Update', ['id'=>'button-submit','class' => $model->isNewRecord ? 'btn btn-success ' : 'btn btn-success']) ?>         

    </div>

</div>
    <?php ActiveForm::end(); ?>


