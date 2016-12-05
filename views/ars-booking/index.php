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
        <span>Booking Status</span>
    </li>
</ul>
<?php if(Yii::$app->session->hasFlash('approve')):?>
    <div class="note note-success">
        <button type="button" class="close" data-dismiss="alert"></button>
            <?php echo  Yii::$app->session->getFlash('approve'); ?>
    </div>
<?php endif; ?>
<?php if(Yii::$app->session->hasFlash('reject')):?>
    <div class="note note-danger">
        <button type="button" class="close" data-dismiss="alert"></button>
            <?php echo  Yii::$app->session->getFlash('reject'); ?>
    </div>
<?php endif; ?>
<div class="page-content-inner">
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN SIDEBAR -->
            <div class="profile-sidebar">
                <!-- PORTLET MAIN -->
                <div class="list-group">
                    <?= Html::a('<span class="glyphicon glyphicon-home"></span>&nbsp;My House', ['ars-accommodation/index'],['class'=>'list-group-item']) ?>
                    <?php if($model == 0){ ?>
                        <?= Html::a('<span class="glyphicon glyphicon-file"></span>&nbsp;Booking', ['ars-booking/index'],['class'=>'list-group-item active']) ?>
                    <?php }else{ ?>
                        <?= Html::a('<span class="glyphicon glyphicon-file"></span>&nbsp;Booking<span class="badge badge-danger" style="background-color:#f36a5a;color:#fff;">'.$model.'</span>', ['ars-booking/index'],['class'=>'list-group-item active']) ?>
                    <?php } ?>
                    <?= Html::a('<span class="glyphicon glyphicon-user"></span>&nbsp;Profile', ['ars-accommodation/profile'],['class'=>'list-group-item ']) ?>
                    
                </div>
            </div><!-- END SIDEBAR -->
            <div class="profile-content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="portlet light bordered">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="icon-book-open"></i>Booking Status 
                                </div>
                            </div>
                            <div class="portlet-body">
                                <div class="ars-booking-index">

                                    <h1><?= Html::encode($this->title) ?></h1>
                                    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

                                    <?php Pjax::begin(); ?>    <?= GridView::widget([
                                        'dataProvider' => $dataProvider,
                                        //'filterModel' => $searchModel,
                                        'columns' => [
                                            ['class' => 'yii\grid\SerialColumn'],

                                            'book_date',
                                            'titleacco.acc_title',
                                            'book_status',

                                            [
                                                'header' => 'Action',
                                                'class' => 'yii\grid\ActionColumn',
                                                'template'=>'{view} {delete}',
                                                'buttons' => [
                                                    'view' => function ($url, $model) {
                                                        return Html::a('<i class="fa fa-eye"></i>', 
                                                            $url,['title'=> Yii::t('app','View'),'class'=>'btn btn-circle btn-icon-only green-meadow']);

                                                    },
                                                    'delete' => function ($url, $model) {
                                                        return Html::a('<i class="glyphicon glyphicon-trash"></i>', 
                                                            $url,['title'=> Yii::t('app','Delete'),'class'=>'btn btn-circle btn-icon-only alert-danger','data-confirm'=>"Are you sure you to delete this ?",'data-method'=>'post']);

                                                    },
                                                ],
                                            ],
                                        ],
                                        'tableOptions' =>['class' => 'table table-striped table-hover'],
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
