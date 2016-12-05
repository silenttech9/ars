<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ArsBooking */
foreach ($model as $key => $value) {
    $book_status = $value['book_status'];
    $book_date = $value['book_date'];
    $acc_title = $value['acc_title'];
    $user_name = $value['user_name'];
    $user_phone = $value['user_phone'];
    $user_email = $value['user_email'];
    $role = $value['role'];
    $id = $value['id'];
}
?>
<ul class="page-breadcrumb breadcrumb">
    <li>
        <?= Html::a('Home', ['site/advertise']) ?>
            <i class="fa fa-circle"></i>
    </li>
    <li>
        <?= Html::a('Booking', ['ars-booking/index']) ?>
            <i class="fa fa-circle"></i>
    </li>
    <li>
        <span>Details</span>
    </li>
</ul>
<?php if(Yii::$app->session->hasFlash('errorAccept')):?>
    <div class="note note-danger">
        <button type="button" class="close" data-dismiss="alert"></button>
            <?php echo  Yii::$app->session->getFlash('errorAccept'); ?>
    </div>
<?php endif; ?>
<div class="row">
    <div class='col-md-12'>
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption font-green-haze">
                    <i class="icon-eye font-green-haze"></i>
                    <span class="caption-subject bold uppercase">Details Booking </span>
                </div>
            </div>
            <div class="portlet-body">
                <table class='table table-striped table-hover'>
                    <tr>
                        <td>Title</td>
                        <td><?= $acc_title ?></td>
                    </tr>
                    <tr>
                        <td>Booking Status</td>
                        <td><?= $book_status ?></td>
                    </tr>
                    <tr>
                        <td>Booking Date</td>
                        <td><?= $book_date ?></td>
                    </tr>
                    <tr>
                        <td>Student Name</td>
                        <td><?= $user_name ?></td>
                    </tr>
                    <tr>
                        <td>Student Phone Number</td>
                        <td><?= $user_phone ?></td>
                    </tr>
                    <tr>
                        <td>Student Email</td>
                        <td><?= $user_email ?></td>
                    </tr>
                </table>
<?= Html::a('<i class="fa fa-hand-o-left"></i>Back', ['ars-booking/index'], ['class' => 'btn btn-lg default margin-bottom-5']) ?>
<?= Html::a('Accept<i class="fa fa-check"></i>', ['ars-booking/approve','id'=>$id], ['class' => 'btn btn-lg green-meadow margin-bottom-5']) ?>
<?= Html::a('Reject<i class="fa fa-times"></i>', ['ars-booking/reject','id'=>$id], ['class' => 'btn btn-lg alert-danger margin-bottom-5']) ?>

            </div>
        </div>
    </div>
</div>