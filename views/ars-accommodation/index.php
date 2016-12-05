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
        <span>Accommodation</span>
    </li>
</ul>

<div class="page-content-inner">
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN SIDEBAR -->
            <div class="profile-sidebar">
                <!-- PORTLET MAIN -->
                <div class="list-group">
                    <?= Html::a('<span class="glyphicon glyphicon-home"></span>&nbsp;My House', ['ars-accommodation/index'],['class'=>'list-group-item active']) ?>
                    <?php if($model == 0){ ?>
                        <?= Html::a('<span class="glyphicon glyphicon-file"></span>&nbsp;Booking', ['ars-booking/index'],['class'=>'list-group-item ']) ?>
                    <?php }else{ ?>
                        <?= Html::a('<span class="glyphicon glyphicon-file"></span>&nbsp;Booking<span class="badge badge-danger" style="background-color:#f36a5a;color:#fff;">'.$model.'</span>', ['ars-booking/index'],['class'=>'list-group-item ']) ?>
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
                                    <i class="fa fa-home"></i>Accommodation Listing
                                </div>
                                <div class="actions">
                                    <?= Html::a('<i class="fa fa-plus"></i><span class="hidden-xs">Add More </span>', ['create'], ['class' => 'btn green-meadow']) ?>
                                </div>
                            </div>
                            <?php if(Yii::$app->session->hasFlash('addAcc')):?>
                                <div class="note note-success">
                                    <button type="button" class="close" data-dismiss="alert"></button>
                                        <?php echo  Yii::$app->session->getFlash('addAcc'); ?>
                                </div>
                            <?php endif; ?>
                            <div class="portlet-body">
                                <div class="ars-accommodation-index">

                                    <h1><?= Html::encode($this->title) ?></h1>
                                    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

                                    <?php Pjax::begin(); ?>    <?= GridView::widget([
                                        'dataProvider' => $dataProvider,
                                        //'filterModel' => $searchModel,
                                        'columns' => [
                                            ['class' => 'yii\grid\SerialColumn'],
                                             'acc_title',
                                            'acc_status',

                                            [
                                                'header' => 'Action',
                                                'class' => 'yii\grid\ActionColumn',
                                                'template'=>'{view} {update} {delete}',
                                                'buttons' => [
                                                    'view' => function ($url, $model) {
                                                        return Html::a('<i class="fa fa-eye"></i>', 
                                                            $url,['title'=> Yii::t('app','View'),'class'=>'btn btn-circle btn-icon-only default']);

                                                    },
                                                    'update' => function ($url, $model) {
                                                        return Html::a('<i class="fa fa-edit"></i>', 
                                                            $url,['title'=> Yii::t('app','Update'),'class'=>'btn btn-circle btn-icon-only blue']);

                                                    },
                                                    'delete' => function ($url, $model) {
                                                        return Html::a('<i class="fa fa-trash"></i>', 
                                                            $url,['title'=> Yii::t('app','delete'),'class'=>'btn btn-circle btn-icon-only alert-danger','data-method'=>'post','data-confirm'=>"Are sure want to delete this item ?"]);

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
