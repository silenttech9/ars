<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ArsImageAccommodation */

$this->title = 'Create Ars Image Accommodation';
$this->params['breadcrumbs'][] = ['label' => 'Ars Image Accommodations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ars-image-accommodation-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
