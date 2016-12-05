<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ArsImageAccommodation */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ars-image-accommodation-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'acc_image')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'acc_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
