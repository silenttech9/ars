<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ArsAccommodation */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ars-accommodation-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'acc_price')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'acc_bathroom')->textInput() ?>

    <?= $form->field($model, 'acc_description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'acc_status')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'acc_dateAdded')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'acc_postcode')->textInput() ?>

    <?= $form->field($model, 'acc_city')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'acc_state')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'acc_noRoom')->textInput() ?>

    <?= $form->field($model, 'acc_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'acc_preference')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'acc_seksyen')->textInput() ?>

    <?= $form->field($model, 'acc_address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'acc_typeAcc')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
