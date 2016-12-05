<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ArsAccommodationSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ars-accommodation-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'acc_price') ?>

    <?= $form->field($model, 'acc_bathroom') ?>

    <?= $form->field($model, 'acc_description') ?>

    <?= $form->field($model, 'acc_status') ?>

    <?php // echo $form->field($model, 'acc_dateAdded') ?>

    <?php // echo $form->field($model, 'user_id') ?>

    <?php // echo $form->field($model, 'acc_postcode') ?>

    <?php // echo $form->field($model, 'acc_city') ?>

    <?php // echo $form->field($model, 'acc_state') ?>

    <?php // echo $form->field($model, 'acc_noRoom') ?>

    <?php // echo $form->field($model, 'acc_title') ?>

    <?php // echo $form->field($model, 'acc_preference') ?>

    <?php // echo $form->field($model, 'acc_seksyen') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
