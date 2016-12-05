<?php
use yii\helpers\Html;
/* @var $this yii\web\View */

$this->title = 'Accommodation Rental System';
?>
<span id="mainPage" class="<?php echo Yii::$app->controller->id."/".Yii::$app->controller->action->id;?>"></span>
    <div class='guest' style='display:none;'>
        <div class="site-index">

            <div class="jumbotron">
                <h1>Find Your Accommodation</h1>

                <p class="lead"></p>
                <div class="search-bar ">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="input-group">
                                <input type="text" class="form-control input-lg" id="inputlg" placeholder="Search for...">
                                <span class="input-group-btn">
                                    <a href='/ars/web/index.php?r=site/advertise' class="btn btn-lg btn-success" type="button">Search</a>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="body-content">
                <div class='footerGuest'>
                    <div class='row'>
                        <div class='col-md-8'>
                            <h2><strong>Accommodation Rental System</strong></h2>
                                <p>Welcome to A-rs website, there are over 1000 rental home listings around Shah Alam, Selangor. This website is for the use of Non-Resident students UiTM Shah Alam and facilitate student looking for lodging in each semester.</p>                        </div>
                        <div class='col-md-4'>
                            <h2><strong class='register'><?= Html::a('Register', ['site/register']) ?> </strong>Here!</h2>
                            <p>Let's start to placing rental house for free</p>
                            <p><?= Html::a('Already have an account ? Login here&raquo;', ['site/login2'],['class'=>'btn btn-default']) ?></p>
                        </div>
                    </div>
                    
                </div>
                        

                        
            </div>

            </div>
            
        </div>
<center>
        <p style="color:white;">&copy;Accommodation Rental System <?= date('Y') ?></p>
    </center>
