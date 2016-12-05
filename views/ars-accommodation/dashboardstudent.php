<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\ArsAccommodationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */


?>
<ul class="page-breadcrumb breadcrumb">
    <li>
        <?= Html::a('Home', ['site/index']) ?>
            <i class="fa fa-circle"></i>
    </li>
    <li>
        <span>Dashboard</span>
    </li>
</ul>
<div class="page-content-inner">
    <div class="row">
    	<div class="col-md-12">
    		<!-- BEGIN SIDEBAR -->
            <div class="profile-sidebar">
            	<!-- PORTLET MAIN -->
				<div class="list-group">
					<?= Html::a('<span class="glyphicon glyphicon-dashboard"></span>&nbsp;Dashboard', ['ars-booking/index'],['class'=>'list-group-item active']) ?>
					<?= Html::a('<span class="glyphicon glyphicon-user"></span>&nbsp;Profile', ['ars-accommodation/profile'],['class'=>'list-group-item']) ?>
					<?= Html::a('<span class="glyphicon glyphicon-home"></span>&nbsp;My House', ['ars-accommodation/index'],['class'=>'list-group-item']) ?>
  					<?= Html::a('<span class="glyphicon glyphicon-file"></span>&nbsp;Booking', ['ars-booking/index'],['class'=>'list-group-item']) ?>
				</div>
            </div><!-- END SIDEBAR -->
            <div class="profile-content">
                
    		</div>
    	</div>
    </div>
</div>
