<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class='page-md login'>
    <div class='content'>
         <!-- BEGIN LOGIN FORM -->
    <?php $form = ActiveForm::begin([
        'options' => ['class' => 'login-form'],
    ]); ?>
        <div class="logo">
            <img src="/ars/web/images/logo.png" >
        </div>
        <div class="form-group">
            <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
            <label class="control-label visible-ie8 visible-ie9">Username</label>
            <div class="input-icon">
                <i class="fa fa-user"></i>
                <?= Html::activeTextInput($model,'email',['class'=>'form-control placeholder-no-fix','placeholder'=>'Email','autocomplete'=>'off']); ?>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9">Password</label>
            <div class="input-icon">
                <i class="fa fa-lock"></i>
                <?= Html::activePasswordInput($model,'password',['class'=>'form-control placeholder-no-fix','placeholder'=>'Password','autocomplete'=>'off']); ?>
            </div>
        </div>
        <?= $form->errorSummary($model,['class'=>'alert alert-danger','header'=>'']); ?>
        <div class="form-actions">
            <?= Html::submitButton('Login <i class="m-icon-swapright m-icon-white"></i>', ['class' => 'btn green-meadow btn-block uppercase', 'name' => 'Login']) ?>
        </div>
        <div class="forget-password">
            <h4>Forgot your password ?</h4>
            <p>
                 no worries, click <a href="http://localhost/ars/web/index.php?r=site/forgot"  class="forget-password">here</a>
                to reset your password.
            </p>
        </div>
        <div class="create-account">
            <p> 
                 Don't have an account yet ?&nbsp; <?= Html::a('Create an account', ['site/register']) ?>
            </p>
        </div>
    <?php ActiveForm::end(); ?>
    <!-- END LOGIN FORM -->

    </div>
    <br>
    <center>
        <p style="color:white;">&copy;Accommodation Rental System <?= date('Y') ?></p>
    </center>
</div>
   
