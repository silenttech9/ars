<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ArsAccommodation */

$this->title = 'Create Ars Accommodation';
$this->params['breadcrumbs'][] = ['label' => 'Ars Accommodations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ars-accommodation-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
