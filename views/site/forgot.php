<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Contact';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class='page-md login'>
    <div class='content'>
        <?php $form = ActiveForm::begin([
            'options' => ['id' => 'contact-form'],
        ]); ?>
            <h3>Forget Password ?</h3>
            <p>
                 Enter your e-mail address below to reset your password.
            </p>
            
            <div class="form-group">
                <div class="input-icon">
                    <i class="fa fa-envelope"></i>
                    <?= Html::activeTextInput($model,'email',['class'=>'form-control form-control placeholder-no-fix','placeholder'=>'Email']); ?>
                </div>
            </div>
            <div class="form-actions">
                
                <?= Html::a('<i class="m-icon-swapleft"></i>Back', ['site/login2'], ['class' => 'btn','id'=>'back-btn']) ?>
                <?= Html::submitButton('Submit <i class="m-icon-swapright m-icon-white"></i>', ['class' => 'btn green-haze pull-right']) ?>
            </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>

