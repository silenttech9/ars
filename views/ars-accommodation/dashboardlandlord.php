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
        <?= Html::a('Home', ['site/advertise']) ?>
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
					<?= Html::a('<span class="glyphicon glyphicon-dashboard"></span>&nbsp;Dashboard', ['ars-accommodation/dashboardlandlord'],['class'=>'list-group-item active']) ?>
					<?= Html::a('<span class="glyphicon glyphicon-user"></span>&nbsp;Profile', ['ars-accommodation/profile'],['class'=>'list-group-item']) ?>
					<?= Html::a('<span class="glyphicon glyphicon-home"></span>&nbsp;My House', ['ars-accommodation/index'],['class'=>'list-group-item']) ?>
  					<?= Html::a('<span class="glyphicon glyphicon-file"></span>&nbsp;Booking', ['ars-booking/index'],['class'=>'list-group-item']) ?>
				</div>
            </div><!-- END SIDEBAR -->
            <div class="profile-content">
                <div class="row">
                	<div class="col-md-12">
                		<div class="portlet light bordered">
                			<div class="portlet-title">
                                <div class="caption">
                                    <i class="icon-globe font-green-sharp"></i>
                                                <span class="caption-subject font-green-sharp bold uppercase">Feeds</span>
                                </div>
                            </div>
                            <div class="portlet-body">
                                <div class="task-content">
                                	<div class="mt-actions">
                                		<div class="mt-action">
                                            <div class="mt-action-body">
                                                <div class="mt-action-row">
                                                    <div class="mt-action-info ">
                                                        <div class="mt-action-details ">
                                                            <span class="mt-action-author">Natasha Kim</span>
                                                                <p class="mt-action-desc">pending for approval pending for approval pending for approval pending for approval</p>
                                                        </div>
                                                    </div>
                                                    <div class="mt-action-datetime ">
                                                        <span class="mt-action-date">3 jun</span>
                                                        <span class="mt-action-dot bg-green"></span>
                                                        <span class="mt=action-time">9:30-13:00</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                	</div>
                                	<div class="mt-actions">
                                		<div class="mt-action">
                                            <div class="mt-action-body">
                                                <div class="mt-action-row">
                                                    <div class="mt-action-info ">
                                                        <div class="mt-action-details ">
                                                            <span class="mt-action-author">Natasha Kim</span>
                                                                <p class="mt-action-desc">pending for approval pending for approval pending for approval pending for approval</p>
                                                        </div>
                                                    </div>
                                                    <div class="mt-action-datetime ">
                                                        <span class="mt-action-date">3 jun</span>
                                                        <span class="mt-action-dot bg-green"></span>
                                                        <span class="mt=action-time">9:30-13:00</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                	</div>
                                	<div class="mt-actions">
                                		<div class="mt-action">
                                            <div class="mt-action-body">
                                                <div class="mt-action-row">
                                                    <div class="mt-action-info ">
                                                        <div class="mt-action-details ">
                                                            <span class="mt-action-author">Natasha Kim</span>
                                                                <p class="mt-action-desc">pending for approval pending for approval pending for approval pending for approval</p>
                                                        </div>
                                                    </div>
                                                    <div class="mt-action-datetime ">
                                                        <span class="mt-action-date">3 jun</span>
                                                        <span class="mt-action-dot bg-green"></span>
                                                        <span class="mt=action-time">9:30-13:00</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                	</div>
                                	<div class="mt-actions">
                                		<div class="mt-action">
                                            <div class="mt-action-body">
                                                <div class="mt-action-row">
                                                    <div class="mt-action-info ">
                                                        <div class="mt-action-details ">
                                                            <span class="mt-action-author">Natasha Kim</span>
                                                                <p class="mt-action-desc">pending for approval pending for approval pending for approval pending for approval</p>
                                                        </div>
                                                    </div>
                                                    <div class="mt-action-datetime ">
                                                        <span class="mt-action-date">3 jun</span>
                                                        <span class="mt-action-dot bg-green"></span>
                                                        <span class="mt=action-time">9:30-13:00</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                	</div>
                                </div>
                            </div>
                		</div>
                	</div>
                </div>
    		</div>
    	</div>
    </div>
</div>
