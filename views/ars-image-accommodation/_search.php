<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ArsImageAccommodationSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ars-image-accommodation-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'acc_image') ?>

    <?= $form->field($model, 'acc_image2') ?>

    <?= $form->field($model, 'acc_image3') ?>

    <?= $form->field($model, 'acc_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
