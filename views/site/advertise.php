<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\ArsAccommodationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */


?>


<div class="page-content-inner">
    <div class="row">
        <div class="col-md-12">
            <div class="profile-content">

                <div class="row">
                    <div class="col-md-12">
                        <div class="portlet light bordered">
                            <div class='portlet-title'>
                                <div class='caption'>
                                    List of accommodation
                                </div>
                                <div class='actions'>
                                    <button id='slidesearch' class='btn green-meadow'>Search More </button>
                                </div>
                                
                            </div>
                            <div id="showsearch"><?php  echo $this->render('_search', ['model' => $searchModel]); ?></div>
                            <div class="portlet-body">
                                <div class="ars-accommodation-index">

                                    <h1><?= Html::encode($this->title) ?></h1>
                                    

                                    <?php Pjax::begin(); ?>    <?= GridView::widget([
                                        'dataProvider' => $dataProvider,
                                        //'filterModel' => $searchModel,
                                        'summary'=>'',
                                        'columns' => [
                                            //['class' => 'yii\grid\SerialColumn'],
                                        [
                                            'attribute' => 'acc_image',
                                            'format' => 'html',
                                            'label' => '',
                                            'value' => function ($data) {
                                                return Html::img('/ars/web/' . $data['acc_image'],
                                                    ['width' => '120px','height'=>'90px']);
                                            },
                                        ],
                                            [
					                             'attribute' => '',
					                             'value' => 'acc_title',
					                             //'contentOptions' =>['class' => 'hidden-xs','style'=>'font-size:18px;'],
					                        ],
                                            [
                                                'attribute' => '',
                                                'format' => 'raw',
                                                
                                                'value' => function ($model, $key, $index) { 
                                                    return Html::a('<span><font color="red"><strong>RM'.$model->acc_price.'</strong></font></span>');
                                                },
                                            ],
                                            [
                                                'header' => '',
                                                'class' => 'yii\grid\ActionColumn',
                                                'template'=>'{view}',
                                                'buttons' => [
                                                    'view' => function ($url, $model) {
                                                        return Html::a('<span class="btn btn-circle btn-icon-only green-meadow"><i class="fa fa-phone"></i></span>', 
                                                            $url,['title'=> Yii::t('app','View')]);
                                                    },
                                                ],
                                                'urlCreator' => function ($action, $model, $key, $index) {
                                                    if ($action === 'view') {
                                                        $url = ['ars-booking/booking','id'=>$model->id];
                                                            return $url;
                                                        }
                                                    }
                                            ],
                                        ],
                                        'tableOptions' =>['class' => 'table table-striped table-hover fontadvertise'],
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

