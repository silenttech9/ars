<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ArsPasswordReference */

$this->title = 'Update Ars Password Reference: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Ars Password References', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ars-password-reference-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
