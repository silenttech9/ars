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
        <span>Update </span>
    </li>
</ul>
<div class='row'>
	<div class="col-md-12">
		<div class="note note-danger">
            <p> NOTE: Please complete the form that marked (*)</p>
        </div>
        <div class="portlet light bordered">
        	<div class="portlet-title">
	            <div class="caption font-green-haze">
	                <i class="icon-home font-green-haze"></i>
	                <span class="caption-subject bold uppercase">Update Accommodation </span>
	            </div>
	        </div>
	        <div class="portlet-body form">
	        	<?= $this->render('_edit', [
			        'model' => $model,
			    ]) ?>
	        </div>
        </div>
	</div>
</div>

