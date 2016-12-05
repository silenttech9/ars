<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ArsAccommodation */

?>
<ul class="page-breadcrumb breadcrumb">
    <li>
    	<?= Html::a('Home', ['site/advertise']) ?>
            <i class="fa fa-circle"></i>
    </li>
    <li>
    	<?= Html::a('Accommodation', ['ars-accommodation/index']) ?>
            <i class="fa fa-circle"></i>
    </li>
    <li>
        <span>Add More</span>
    </li>
</ul>
<div class='row'>
	<div class="col-md-12">
		<div class="note note-danger">
            <p> NOTE: Please complete the form that marked (*)</p>
        </div>
        <div class="portlet light bordered" id='form_wizard_1'>
        	<div class="portlet-title">
	            <div class="caption font-green-haze">
	                <i class="fa fa-plus font-green-haze"></i>
	                <span class="caption-subject bold uppercase">Add Accommodation </span>
	            </div>
	        </div>
	        <div class="portlet-body form">
	        	<?= $this->render('_form', [
			        'model' => $model,
			        //'models' => (empty($models)) ? [new ArsImageAccommodation] : $models,
			    ]) ?>
	        </div>
        </div>
	</div>
</div>

