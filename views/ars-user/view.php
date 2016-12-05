<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ArsUser */

$this->title = "ARS";
?>
<ul class="page-breadcrumb breadcrumb">
    <li>
        <?= Html::a('Home', ['site/index']) ?>
            <i class="fa fa-circle"></i>
    </li>
    <li>
        <?= Html::a('User Management', ['ars-user/index']) ?>
            <i class="fa fa-circle"></i>
    </li>
    <li>
        <span>View User</span>
    </li>
</ul>

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
                                    <i class="fa fa-eye"></i>View Details
                                </div>
                            </div>
                            
                            <div class="portlet-body">
                                <div class="ars-user-view">


                                    <p>
                                        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                                        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                                            'class' => 'btn btn-danger',
                                            'data' => [
                                                'confirm' => 'Are you sure you want to delete this item?',
                                                'method' => 'post',
                                            ],
                                        ]) ?>
                                    </p>

                                    <?= DetailView::widget([
                                        'model' => $model,
                                        'attributes' => [
                                            'user_name',
                                            'user_icno',
                                            'user_phone',
                                            'user_email:email',
                                            'rolename.role',
                                            'user_dateReg',
                                        ],
                                    ]) ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>