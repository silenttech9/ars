<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use yii\helpers\ArrayHelper; 
use app\models\LookupRole;
/* @var $this yii\web\View */
/* @var $searchModel app\models\ArsAccommodationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$role = ArrayHelper::map(LookupRole::find()->asArray()->all(),'id','role'); //retrieve data from table look_up_pendapatan

?>
<ul class="page-breadcrumb breadcrumb">
    <li>
        <?= Html::a('Home', ['site/advertise']) ?>
            <i class="fa fa-circle"></i>
    </li>
    <li>
        <span>Profile</span>
    </li>
</ul>
<div class="page-content-inner">
<?php if (Yii::$app->user->identity->role == 2) { ?>
    <div class="row">
    	<div class="col-md-12">
    		<!-- BEGIN SIDEBAR -->
            <div class="profile-sidebar">
            	<!-- PORTLET MAIN -->
				<div class="list-group">
                    <?= Html::a('<span class="glyphicon glyphicon-home"></span>&nbsp;My House', ['ars-accommodation/index'],['class'=>'list-group-item']) ?>
                    <?php if($model3 == 0){ ?>
                        <?= Html::a('<span class="glyphicon glyphicon-file"></span>&nbsp;Booking', ['ars-booking/index'],['class'=>'list-group-item ']) ?>
                    <?php }else{ ?>
                        <?= Html::a('<span class="glyphicon glyphicon-file"></span>&nbsp;Booking<span class="badge badge-danger" style="background-color:#f36a5a;color:#fff;">'.$model3.'</span>', ['ars-booking/index'],['class'=>'list-group-item ']) ?>
                    <?php } ?>
                    <?= Html::a('<span class="glyphicon glyphicon-user"></span>&nbsp;Profile', ['ars-accommodation/profile'],['class'=>'list-group-item active ']) ?>

				</div>
            </div><!-- END SIDEBAR -->
            <div class="profile-content">
                <div class="row">
                	<div class="col-md-12">
                		<div class="portlet light bordered ">
                            <div class="portlet-title tabbable-line">
                                <div class="caption">
                                    <i class="fa fa-user"></i>
                                        <span class="caption-subject font-blue-madison bold uppercase">Edit Profile</span>
                                </div>
                                <ul class="nav nav-tabs">
                                    <li class="active">
                                        <a href="#tab_1_1" data-toggle="tab">Personal Info</a>
                                    </li>
                                    <li>
                                        <a href="#tab_1_3" data-toggle="tab">Change Password</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="portlet-body">
                                <div class="tab-content">
                                    <!-- PERSONAL INFO TAB -->
                                    <div class="tab-pane active" id="tab_1_1">
                                        <?php if(Yii::$app->session->hasFlash('profileupdate')):?>
                                            <div class="alert alert-success">
                                                <button type="button" class="close" data-dismiss="alert"></button>
                                                 <?php echo  Yii::$app->session->getFlash('profileupdate'); ?>
                                            </div>
                                        <?php endif; ?>
                                        <?php $form = ActiveForm::begin(); ?>
                                        <?= $form->errorSummary($model,['class'=>'alert alert-danger','header'=>'']); ?>
                                        <div class="row">
                                            <div class="portlet-body form">
                                                <div class="form-body">
                                                    <div class='col-md-6'>
                                                        <div class="form-group form-md-line-input">
                                                            <?= Html::activeTextInput($model,'user_name',['class'=>'form-control']); ?>
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
                                                            <?= Html::activeTextInput($model,'user_icno',['class'=>'form-control']); ?>
                                                                <label for="form_control_1"><?= Html::activeLabel($model,'user_icno'); ?> <span class="required">*</span></label>
                                                                <span class="help-block"><?= Html::error($model,'user_icno'); ?></span>
                                                        </div>
                                                    </div>
                                                    <div class='col-md-6'>
                                                        <div class="form-group form-md-line-input">
                                                            <?= Html::activeTextInput($model,'user_phone',['class'=>'form-control']); ?>
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
                                                            <?= Html::activeTextArea($model,'user_address',['class'=>'form-control','rows'=>'3']); ?>
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
                                                            <?= Html::activeTextInput($model,'user_email',['class'=>'form-control']); ?>
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
                                            </div>
                                        <?php ActiveForm::end(); ?>
                                    </div>
                                    <!-- END PERSONAL INFO TAB -->
                                    <!-- CHANGE PASSWORD TAB -->
                                    <div class="tab-pane" id="tab_1_3">
                                        <?php $form = ActiveForm::begin(); ?>
                                            <?= $form->errorSummary($model,['class'=>'alert alert-danger','header'=>'']); ?>

                                            <div class="row">
                                                <div class="portlet-body form">
                                                    <div class="form-body">
                                                        <div class='col-md-6'>
                                                            <div class="form-group form-md-line-input">
                                                                <?= Html::activePasswordInput($model2,'password_reference',['class'=>'form-control']); ?>
                                                                    <label for="form_control_1">Old Password</label>
                                                                    <span class="help-block"><?= Html::error($model2,'password_reference'); ?></span>
                                                            </div>
                                                        </div>
                                                        <div class='col-md-6'>
                                                            <div class="form-group form-md-line-input">
                                                                <?= Html::activePasswordInput($model,'password_hash',['class'=>'form-control']); ?>
                                                                    <label for="form_control_1">New Password</label>
                                                                    <span class="help-block"><?= Html::error($model,'password_hash'); ?></span>
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
                                    <!-- END CHANGE PASSWORD TAB -->
                                    
                                </div>
                            </div>
                        </div>
                	</div>
                </div>
    		</div>
    	</div>
    </div>
<?php } else if (Yii::$app->user->identity->role == 3) { ?>
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN SIDEBAR -->
            <div class="profile-sidebar">
                <!-- PORTLET MAIN -->
                <div class="list-group">
                    <?= Html::a('<span class="glyphicon glyphicon-dashboard"></span>&nbsp;Dashboard', ['ars-booking/status'],['class'=>'list-group-item']) ?>
                    <?= Html::a('<span class="glyphicon glyphicon-user"></span>&nbsp;Profile', ['ars-accommodation/profile'],['class'=>'list-group-item active']) ?>
                    
                </div>
            </div><!-- END SIDEBAR -->
            <div class="profile-content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="portlet light bordered ">
                            <div class="portlet-title tabbable-line">
                                <div class="caption">
                                    <i class="fa fa-user"></i>
                                        <span class="caption-subject font-green-sharp bold uppercase">Edit Profile</span>
                                </div>
                                <ul class="nav nav-tabs">
                                    <li class="active">
                                        <a href="#tab_1_1" data-toggle="tab">Personal Info</a>
                                    </li>
                                    <li>
                                        <a href="#tab_1_3" data-toggle="tab">Change Password</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="portlet-body">
                                <div class="tab-content">
                                    <!-- PERSONAL INFO TAB -->
                                    <div class="tab-pane active" id="tab_1_1">
                                        <?php if(Yii::$app->session->hasFlash('profileupdate')):?>
                                            <div class="alert alert-success">
                                                <button type="button" class="close" data-dismiss="alert"></button>
                                                 <?php echo  Yii::$app->session->getFlash('profileupdate'); ?>
                                            </div>
                                        <?php endif; ?>
                                        <?php $form = ActiveForm::begin(); ?>
                                        <?= $form->errorSummary($model,['class'=>'alert alert-danger','header'=>'']); ?>
                                        <div class="row">
                                            <div class="portlet-body form">
                                                <div class="form-body">
                                                    <div class='col-md-6'>
                                                        <div class="form-group form-md-line-input">
                                                            <?= Html::activeTextInput($model,'user_name',['class'=>'form-control']); ?>
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
                                                            <?= Html::activeTextInput($model,'user_icno',['class'=>'form-control']); ?>
                                                                <label for="form_control_1"><?= Html::activeLabel($model,'user_icno'); ?> <span class="required">*</span></label>
                                                                <span class="help-block"><?= Html::error($model,'user_icno'); ?></span>
                                                        </div>
                                                    </div>
                                                    <div class='col-md-6'>
                                                        <div class="form-group form-md-line-input">
                                                            <?= Html::activeTextInput($model,'user_phone',['class'=>'form-control']); ?>
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
                                                            <?= Html::activeTextArea($model,'user_address',['class'=>'form-control','rows'=>'3']); ?>
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
                                                            <?= Html::activeTextInput($model,'user_email',['class'=>'form-control']); ?>
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
                                            </div>
                                        <?php ActiveForm::end(); ?>
                                    </div>
                                    <!-- END PERSONAL INFO TAB -->
                                    <!-- CHANGE PASSWORD TAB -->
                                    <div class="tab-pane" id="tab_1_3">
                                        <?php $form = ActiveForm::begin(); ?>
                                            <?= $form->errorSummary($model,['class'=>'alert alert-danger','header'=>'']); ?>

                                            <div class="row">
                                                <div class="portlet-body form">
                                                    <div class="form-body">
                                                        <div class='col-md-6'>
                                                            <div class="form-group form-md-line-input">
                                                                <?= Html::activePasswordInput($model2,'password_reference',['class'=>'form-control']); ?>
                                                                    <label for="form_control_1">Old Password</label>
                                                                    <span class="help-block"><?= Html::error($model2,'password_reference'); ?></span>
                                                            </div>
                                                        </div>
                                                        <div class='col-md-6'>
                                                            <div class="form-group form-md-line-input">
                                                                <?= Html::activePasswordInput($model,'password_hash',['class'=>'form-control']); ?>
                                                                    <label for="form_control_1">New Password</label>
                                                                    <span class="help-block"><?= Html::error($model,'password_hash'); ?></span>
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
                                    <!-- END CHANGE PASSWORD TAB -->
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php }?>
</div>
