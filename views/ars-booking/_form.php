<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ArsBooking */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ars-booking-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'book_date')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'acc_id')->textInput() ?>

    <?= $form->field($model, 'book_status')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
