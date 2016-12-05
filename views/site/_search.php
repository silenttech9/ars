<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\LookupAccommodation;
use app\models\LookupArea;
/* @var $this yii\web\View */
/* @var $model app\models\ArsAccommodationSearch */
/* @var $form yii\widgets\ActiveForm */
$type_flat = ArrayHelper::map(LookupAccommodation::find()->asArray()->orderBy(['type_name'=>SORT_ASC])->all(),'id','type_name'); //retrieve data from table LookupAccommodation
$seksyen_area = ArrayHelper::map(LookupArea::find()->asArray()->orderBy(['id'=>SORT_ASC])->all(),'id','seksyen_area'); //retrieve data from table Lookup Area
?>

<div class="ars-accommodation-search">

    <?php $form = ActiveForm::begin([
        'action' => ['advertise'],
        'method' => 'get',
    ]); ?>

<div class='row'>
    <div class='col-md-3'>
        <div class="form-group form-md-line-input">
            <?= Html::activeTextInput($model,'acc_price',['class'=>'form-control ','placeholder'=>'Search By Price ...']); ?>
            <label for="form_control_1"></label>
        </div>
    </div>
    <div class='col-md-3'>
        <div class="form-group form-md-line-input">
            <?= Html::activeTextInput($model,'acc_noRoom',['class'=>'form-control','placeholder'=>'Search By Number of Room ...']); ?>
            <label for="form_control_1"></label>
        </div>
    </div>
    <div class='col-md-3'>
        <div class="form-group form-md-line-input">
            <?= Html::activeDropDownList($model, 'acc_seksyen', $seksyen_area, 
                [
                    'prompt'=>'(Seksyen Area)',
                    'class'=>'form-control',

                ]); ?>
            <label for="form_control_1"></label>
        </div>
    </div>
    <div class='col-md-3'>
        <div class="form-group form-md-line-input">
            <?= Html::activeDropDownList($model, 'acc_typeAcc', $type_flat, 
                [
                    'prompt'=>'(Type of House)',
                    'class'=>'form-control',

                ]); ?>
            <label for="form_control_1"></label>
        </div>
    </div>
</div>

    <?= Html::submitButton('Search', ['class' => 'btn green-haze']) ?>
    <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>

    <?php ActiveForm::end(); ?>

</div>

