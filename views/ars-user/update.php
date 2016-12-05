<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ArsUser */

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
        <span>Update User</span>
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
					            <div class="caption font-green-haze">
					                <i class="icon-user font-green-haze"></i>
					                <span class="caption-subject bold uppercase">Update User </span>
					            </div>
					        </div>
                            
                            <div class="portlet-body">
                            <?php if(Yii::$app->session->hasFlash('profileupdate')):?>
                                            <div class="alert alert-success">
                                                <button type="button" class="close" data-dismiss="alert"></button>
                                                 <?php echo  Yii::$app->session->getFlash('profileupdate'); ?>
                                            </div>
                            <?php endif; ?>
                                <div class="portlet-body form">
						        	<?= $this->render('_edit', [
								        'model' => $model,
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