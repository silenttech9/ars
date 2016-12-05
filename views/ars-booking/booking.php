<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ArsAccommodation */
foreach ($model as $key => $value) {
    $id = $value['id'];
    $image = $value['acc_image'];
    $title = $value['acc_title'];
    $user_name = $value['user_name'];
    $description = $value['acc_description'];
    $noroom = $value['acc_noRoom'];
    $nobathroom = $value['acc_bathroom'];
    $address =$value['acc_address'];
    $preference = $value['acc_preference'];
    $monthly = $value['acc_price'];
    $phone = $value['user_phone'];
    $acc_lat = $value['acc_lat'];
    $acc_long = $value['acc_long'];
}
?>
<div class="ars-accommodation-view">
    <div class="well">
        If you are interested, please make booking immediately by pressing the button <b>'Booking'</b>
    </div>
    <div class='row'>
        <div class='col-md-6'>
            <div class="">
                <div class="">
                    <img src="/ars/web/<?php echo $image; ?>" width='500px' height='450px' >
                </div>
            </div>
            
        </div>
        <div class='col-md-6'>
            <div class="portlet light bordered">
                <div class="portlet-title">
                        <div class="caption">
                            <h3><strong><?= $title ?></strong>&nbsp;<small><i>Posted by <?= $user_name ?></i></small></h3>
                        </div>
                </div>
                <div class="portlet-body">
                    <h4><b>Description</b></h4>
                    <p><?= $description ?></p>
                    <p><?= $noroom ?> rooms</p>
                    <p><?= $nobathroom ?> bathroom</p>
                    <h4><b>Location</b></h4>
                    <p><?= $address ?></p>
                    <h4><b>Monthly Rental</b></h4>
                    <p>RM<?= $monthly ?></p>
                    <h4><b>Preference</b></h4>
                    <p><?= $preference ?></p>
                    <h4><b>Contact</b></h4>
                    <p><?= $phone ?></p>
                    <?php if(Yii::$app->user->identity->role == 1 || Yii::$app->user->identity->role == 2) { ?>

                    <?php }else{ ?>
                        <?= Html::a('Booking', ['ars-booking/confirmbook', 'id' => $id], ['class' => 'btn green']) ?>
                        <?= Html::a('Not interested ? Find more accommodation here', ['site/advertise'], ['class' => 'btn default']) ?>
                    <?php }?>
                    
                </div>
            </div>
            
        </div>
    </div>
    <br>
    <div class='row'>
        <div class="col-md-12">
            <div class="portlet light bordered">
                <div class="portlet-body">
                    <div id='map1'></div><br>
                        <a href="http://maps.google.com?q=<?php echo $acc_lat; ?>,<?php echo $acc_long; ?>" class="btn default m-icon" target="_BLANK">
                            View on Google Map <i class="m-icon-swapright m-icon-black"></i>
                        </a>
                </div>
            </div>
        </div>
    </div>
    <div class='row'>
        <div class="col-md-12">
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <span class="caption-subject theme-font bold uppercase">Others House/Room</span>
                    </div>
                    
                </div>
                <div class="portlet-body">
                        <ul class="feeds">
                            <?php foreach ($model2 as $key => $value) {?>
                            <li>
                                <div class="col1">
                                    <div class="cont">
                                        <div class="cont-col1">
                                            <div class="label label-sm label-success">
                                                <i class="fa fa-bell-o"></i>
                                            </div>
                                        </div>
                                        <div class="cont-col2">
                                            <div class="desc">
                                                <?= Html::a($value['acc_title'], ['ars-booking/booking','id'=>$value['id']]) ?> 
                                                <span class="label label-sm label-danger">
                                                    RM<?= $value['acc_price'] ?>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <?php  } ?>
                        </ul>
                    </div>
            </div>
        </div>
    </div>

</div>
<script type="text/javascript">
function initMap() { 
    var myLatLng = {lat: <?php echo $acc_lat; ?>, lng: <?php echo $acc_long; ?>}; 
  var map = new google.maps.Map(document.getElementById('map1'), 
  { zoom: 17, center: myLatLng }); 
  var marker = new google.maps.Marker({ position: myLatLng, map: map, title: 'Hello World!' }); }
</script>