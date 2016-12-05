<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ArsPasswordReference */

$this->title = 'Create Ars Password Reference';
$this->params['breadcrumbs'][] = ['label' => 'Ars Password References', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ars-password-reference-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
