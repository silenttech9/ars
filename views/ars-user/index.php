
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
        <span>User Management</span>
    </li>
</ul>
<?php if(Yii::$app->session->hasFlash('emailConfirmbook')):?>
    <div class="note note-success">
        <button type="button" class="close" data-dismiss="alert"></button>
            <?php echo  Yii::$app->session->getFlash('emailConfirmbook'); ?>
    </div>
<?php endif; ?>

    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN SIDEBAR -->
            <div class="profile-sidebar">
                <!-- PORTLET MAIN -->
                <div class="list-group">
                    <?= Html::a('<span class="glyphicon glyphicon-user"></span>&nbsp;User List', ['ars-user/index'],['class'=>'list-group-item active']) ?>
                    
                </div>
            </div><!-- END SIDEBAR -->
            <div class="profile-content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="portlet light bordered">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-users"></i>User Listing
                                </div>
                            </div>
                            <?php if(Yii::$app->session->hasFlash('addAcc')):?>
                                <div class="note note-success">
                                    <button type="button" class="close" data-dismiss="alert"></button>
                                        <?php echo  Yii::$app->session->getFlash('addAcc'); ?>
                                </div>
                            <?php endif; ?>
                            <div class="portlet-body">
                                <div class="ars-user-index">

                                    <?php Pjax::begin(); ?>    <?= GridView::widget([
                                            'dataProvider' => $dataProvider,
                                            'filterModel' => $searchModel,
                                            'columns' => [
                                                ['class' => 'yii\grid\SerialColumn'],

                                                'user_name',
                                                'user_icno',
                                                'user_email:email',

                                                ['class' => 'yii\grid\ActionColumn'],
                                            ],
                                        ]); ?>
                                    <?php Pjax::end(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
