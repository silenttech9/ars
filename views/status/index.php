<?php

use yii\helpers\Html;
use yii\widgets\ListView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\StatusSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ars Accommodations';
?>
<div class="ars-accommodation-index">

<?php Pjax::begin(); ?>    
    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'itemOptions' => ['class' => 'item'],
        'itemView' => function ($model, $key, $index, $widget) {
           return '<div class="list-group"><h4 class="list-group-item-heading">' 
           .Html::a(Html::encode($model->acc_title), ['view', 'id' => $model->id],['class'=>"list-group-item"]).
           '</h4><p class="list-group-item-text"><font color="red"><strong>RM'.$model->acc_price.'</strong></font></p></div>';
        },
    ]) 
        
    ?>
<?php Pjax::end(); ?></div>
