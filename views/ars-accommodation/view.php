<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

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
        <span>Details</span>
    </li>
</ul>
<div class="row">
    <div class="col-md-12">
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption font-green-haze">
                    <i class="icon-eye font-green-haze"></i>
                    <span class="caption-subject bold uppercase">Details Accommodation </span>
                </div>
            </div>
            <div class="portlet-body form">
                <div class="portlet-title tabbable-line">
                    <ul class="nav nav-tabs">
                        <li class="active">
                            <a href="#tab_1_1" data-toggle="tab">Accommodation Info</a>
                        </li>
                        <li>
                            <a href="#tab_1_2" data-toggle="tab">Image</a>
                        </li>
                    </ul>
                </div>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_1_1">
                        <!-- BEGIN FORM-->
                        <form class="form-horizontal" role="form">
                            <div class="form-body">
                                <div class="row">
                                    <div class='col-md-6'>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Title:</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static">
                                                        <?= $model->acc_title?>
                                                    </p>
                                                </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">State:</label>
                                            <div class="col-md-9">
                                                <p class="form-control-static">
                                                    <?= $model->acc_state?> 
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class='col-md-6'>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">City:</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static">
                                                        <?= $model->acc_city?>
                                                    </p>
                                                </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Postcode:</label>
                                            <div class="col-md-9">
                                                <p class="form-control-static">
                                                    <?= $model->acc_postcode?> 
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class='col-md-6'>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Address:</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static">
                                                        <?= $model->acc_address?>
                                                    </p>
                                                </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Rental Price:</label>
                                            <div class="col-md-9">
                                                <p class="form-control-static">
                                                    <?= $model->acc_price?> 
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class='col-md-6'>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Number of Bathroom:</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static">
                                                        <?= $model->acc_bathroom?>
                                                    </p>
                                                </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Number of Room:</label>
                                            <div class="col-md-9">
                                                <p class="form-control-static">
                                                    <?= $model->acc_noRoom?> 
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class='col-md-6'>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Preference:</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static">
                                                        <?= $model->acc_preference?>
                                                    </p>
                                                </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Seksyen:</label>
                                            <div class="col-md-9">
                                                <p class="form-control-static">
                                                    <?= $model->acc_seksyen?> 
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class='col-md-6'>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Type Accommodationn:</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static">
                                                        <?= $model->typeacc->type_name?>
                                                    </p>
                                                </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Description:</label>
                                            <div class="col-md-9">
                                                <p class="form-control-static">
                                                    <?= $model->acc_description?> 
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class='col-md-6'>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Status:</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static">
                                                        <?= $model->acc_status?>
                                                    </p>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                                <div class='row'>
                                    <div class='col-md-6'>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Location Map:</label>
                                                <div class="col-md-9">
                                                    <div id='map'></div><br>
                                                    <a href="http://maps.google.com?q=<?php echo $model->acc_lat; ?>,<?php echo $model->acc_long; ?>" class="btn default m-icon" target="_BLANK">
                                                            View on Google Map <i class="m-icon-swapright m-icon-black"></i>
                                                            </a>
                                                </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-offset-3 col-md-9">
                                                <?= Html::a('<i class="fa fa-pencil"></i>Edit', ['ars-accommodation/update','id'=>$model->id],['class'=>'btn green']) ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane" id="tab_1_2">
                        <div class='jumbotron'>
                            <img src="/ars/web/<?php echo $model->acc_image; ?>" width='500px' height='450px' ><br>
                            <div class="form-group">
                                <?= Html::a('<i class="fa fa-pencil"></i>Change Image', ['ars-accommodation/update','id'=>$model->id],['class'=>'btn green']) ?>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
function initMap() { 
    var myLatLng = {lat: <?php echo $model->acc_lat; ?>, lng: <?php echo $model->acc_long; ?>}; 
  var map = new google.maps.Map(document.getElementById('map'), 
  { zoom: 17, center: myLatLng }); 
  var marker = new google.maps.Marker({ position: myLatLng, map: map, title: 'Hello World!' }); }
</script>
