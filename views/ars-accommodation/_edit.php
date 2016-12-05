<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\LookupArea;
use app\models\LookupAccommodation;
use yii\helpers\ArrayHelper; 
/* @var $this yii\web\View */
/* @var $model app\models\ArsAccommodation */
/* @var $form yii\widgets\ActiveForm */
 

$area = ArrayHelper::map(LookupArea::find()->asArray()->orderBy(['id'=>SORT_ASC])->all(),'id','seksyen_area'); //retrieve data from table lookup_area
$type_flat = ArrayHelper::map(LookupAccommodation::find()->asArray()->orderBy(['type_name'=>SORT_ASC])->all(),'id','type_name'); //retrieve data from table LookupAccommodation

?>
<div class="portlet-title tabbable-line">
    <ul class="nav nav-tabs">
        <li class="active">
            <a href="#tab_1_1" data-toggle="tab">Accommodation Info</a>
        </li>
        <li>
            <a href="#tab_1_2" data-toggle="tab">Status Accommodation</a>
        </li>
        <li>
            <a href="#tab_1_3" data-toggle="tab">Change Image</a>
        </li>
    </ul>
</div>
<div class="tab-content">
    <div class="tab-pane active" id="tab_1_1">
        <div class="ars-accommodation-form">

            <?php $form = ActiveForm::begin(); ?>
            <?= $form->errorSummary($model,['class'=>'alert alert-danger','header'=>'']); ?>
            <div class="row">
                <div class="portlet-body form">
                    <div class="form-body">
                        <div class='col-md-12'>
                            <div class="form-group form-md-line-input">
                                <?= Html::activeTextInput($model,'acc_title',['class'=>'form-control']); ?>
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
                            <div class="form-group form-md-line-input">
                                <?= Html::activeTextInput($model,'acc_postcode',['class'=>'form-control']); ?>
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
                            <div class="form-group form-md-line-input">
                                <?= Html::activeTextArea($model,'acc_address',['class'=>'form-control','rows'=>'3']); ?>
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
                            <div class="form-group form-md-line-input">
                                <?= Html::activeTextInput($model,'acc_price',['class'=>'form-control']); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($model,'acc_price'); ?> <span class="required">*</span></label>
                                    <span class="help-block"><?= Html::error($model,'acc_price'); ?></span>
                            </div>
                        </div>
                        <div class='col-md-4'>
                            <div class="form-group form-md-line-input">
                                <?= Html::activeTextInput($model,'acc_bathroom',['class'=>'form-control']); ?>
                                    <label for="form_control_1"><?= Html::activeLabel($model,'acc_bathroom'); ?> <span class="required">*</span></label>
                                    <span class="help-block"><?= Html::error($model,'acc_bathroom'); ?></span>
                            </div>
                        </div>
                        <div class='col-md-4'>
                            <div class="form-group form-md-line-input">
                                <?= Html::activeTextInput($model,'acc_noRoom',['class'=>'form-control']); ?>
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
                            <div class="form-group form-md-line-input">
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
                            <div class="form-group form-md-line-input">
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
                            <div class="form-group form-md-line-input">
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
                            <div class="form-group form-md-line-input">
                                <?= Html::activeTextArea($model,'acc_description',['class'=>'form-control','rows'=>'4']); ?>
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
                            <div class='well'><strong>How to get Latitude and Longitude number ?</strong> Longitude and Latitude is for students to find your home location using GPS. You are recommended to use this <a href="http://www.gps-coordinates.net/" target='_BLANK'><strong>WEBSITE</strong></a> to get the longitude and latitude of the location of your rental house.</div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="portlet-body form">
                        <div class="form-body">
                            <div class='col-md-4'>
                                <div class="form-group form-md-line-input">
                                    <?= Html::activeTextInput($model,'acc_lat',['class'=>'form-control','id'=>'form_control_1']); ?>
                                        <label for="form_control_1"><?= Html::activeLabel($model,'acc_lat'); ?><span class="required">*</span></label>
                                        <span class="help-block"><?= Html::error($model,'acc_lat'); ?></span>
                                </div>
                            </div>
                            <div class='col-md-4'>
                                <div class="form-group form-md-line-input">
                                    <?= Html::activeTextInput($model,'acc_long',['class'=>'form-control','id'=>'form_control_1']); ?>
                                        <label for="form_control_1"><?= Html::activeLabel($model,'acc_long'); ?><span class="required">*</span></label>
                                        <span class="help-block"><?= Html::error($model,'acc_long'); ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        <br>
            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? 'Submit' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>

            <?php ActiveForm::end(); ?>

        </div>
    </div>
    <div class="tab-pane" id="tab_1_2">
        <?php $form = ActiveForm::begin(); ?>
        <div class="row">
            <div class="portlet-body form">
                <div class="form-body">
                    <div class='col-md-4'>
                        <div class="form-group form-md-line-input">
                            <?= Html::activeDropDownList($model, 'acc_status',
                                [
                                    'Publish'=>'Publish',
                                    'Not Publish' =>'Not Publish',
                                ], 
                                [
                                    'prompt'=>'',
                                    'class'=>'form-control',

                                ]); ?>
                                <label for="form_control_1"><?= Html::activeLabel($model,'acc_status'); ?> <span class="required">*</span></label>
                                <span class="help-block"><?= Html::error($model,'acc_status'); ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'Submit' : 'Update', ['class' => $model->isNewRecord ? 'btn green-meadow' : 'btn btn-primary']) ?>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
    <div class="tab-pane" id="tab_1_3">
        <div class="form-group">
                    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data','id' => 'dynamic-form']]); ?>
                        <?= Html::activeFileInput($model,'file',['class'=>'form-control']); ?><br>
                        <div class="form-group">
                            <?= Html::submitButton($model->isNewRecord ? 'Submit' : 'Update', ['class' => $model->isNewRecord ? 'btn green-meadow' : 'btn btn-primary']) ?>
                        </div>
                    <?php ActiveForm::end(); ?>
        </div>
        <div class='jumbotron'>
            
            <img src="/ars/web/<?php echo $model->acc_image; ?>" width='500px' height='450px' ><br>
                
        </div>
    </div>
</div>

