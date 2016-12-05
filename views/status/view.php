<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ArsAccommodation */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Ars Accommodations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ars-accommodation-view">

    <h1><?= Html::encode($this->title) ?></h1>

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
            'id',
            'acc_price',
            'acc_bathroom',
            'acc_description',
            'acc_status',
            'acc_dateAdded',
            'user_id',
            'acc_postcode',
            'acc_city',
            'acc_state',
            'acc_noRoom',
            'acc_title',
            'acc_preference',
            'acc_seksyen',
            'acc_address',
            'acc_typeAcc',
        ],
    ]) ?>

</div>
