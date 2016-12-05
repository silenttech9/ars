<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\LookupArea */


?>
<ul class="page-breadcrumb breadcrumb">
    <li>
    	<?= Html::a('Home', ['site/index']) ?>
            <i class="fa fa-circle"></i>
    </li>
    <li>
    	<?= Html::a('Lookup Area', ['lookup-area/index']) ?>
            <i class="fa fa-circle"></i>
    </li>
    <li>
        <span>Add Lookup Area</span>
    </li>
</ul>
<div class='row'>
	<div class="col-md-12">
		<div class="portlet light bordered">
        	<div class="portlet-title">
	            <div class="caption font-green-haze">
	                <i class="icon-user font-green-haze"></i>
	                <span class="caption-subject bold uppercase">Add Lookup Area </span>
	            </div>
	            <div class="actions">
	                <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="javascript:;" data-original-title="" title=""></a>
	            </div>
	        </div>
	        <div class="portlet-body form">
	        	<?= $this->render('_form', [
			        'model' => $model,
			    ]) ?>
	        </div>
        </div>
    </div>
</div>
