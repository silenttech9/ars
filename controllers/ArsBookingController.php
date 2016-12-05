<?php

namespace app\controllers;

use Yii;
use app\models\ArsBooking;
use app\models\ArsBookingSearch;
use app\models\ArsUser;

use app\models\StatusBookingSearch;
use app\models\ArsAccommodation;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\Query;
/**
 * ArsBookingController implements the CRUD actions for ArsBooking model.
 */
class ArsBookingController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all ArsBooking models.
     * @return mixed
     */
    public function actionIndex()
    {
        $model = ArsBooking::find()
                ->where(['book_status' =>'Pending'])
                ->count();
        
        $searchModel = new ArsBookingSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model'=>$model,
        ]);
    }

    public function actionStatus()
    {
        $searchModel = new StatusBookingSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('status', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    /**
     * Displays a single ArsBooking model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {  
        $query = new Query;
        $query  ->select(['ars_booking.id','ars_booking.book_status', 'ars_booking.book_date','ars_accommodation.acc_title','ars_user.user_name','ars_user.user_phone','ars_user.user_email','lookup_role.role'])  
                ->from('ars_booking')
                ->leftJoin('ars_accommodation', 'ars_accommodation.id = ars_booking.acc_id')
                ->leftJoin('ars_user', 'ars_user.id = ars_booking.user_id')
                ->leftJoin('lookup_role', 'lookup_role.id = ars_user.role')
                ->where(['ars_booking.id'=>$id]);

        $command = $query->createCommand();
        $model = $command->queryAll();
        return $this->render('view', [
            'model' => $model,
        ]);
    }

    public function actionBooking($id)
    {
        //random number for limit sql(model2)
        $length = rand(1,1);
        $chars = array_merge(range(5,9));
        shuffle($chars);
        $number = implode(array_slice($chars, 0,$length));
    
        $query = new Query;
        $query  ->select(['ars_accommodation.id','ars_accommodation.acc_bathroom','ars_accommodation.acc_price','ars_accommodation.acc_noRoom','ars_accommodation.acc_description','ars_accommodation.acc_title','ars_accommodation.acc_preference','ars_accommodation.acc_address','ars_accommodation.acc_image', 'ars_user.user_name','ars_user.user_phone','ars_accommodation.acc_lat','ars_accommodation.acc_long'])  
                ->from('ars_accommodation')
                ->leftJoin('ars_user', 'ars_user.id = ars_accommodation.user_id')
                ->where(['ars_accommodation.id'=>$id]);
        $model2 = ArsAccommodation::find()
                ->where(['acc_status'=>'Publish'])
                ->limit($number)
                ->all();

        $command = $query->createCommand();
        $model = $command->queryAll();

        return $this->render('booking', [
            'model' => $model,
            'model2'=>$model2,
        ]);
    }
    public function actionConfirmbook($id)
    {
        $userid = Yii::$app->user->identity->id;
        $model = new ArsBooking();
        
        $model2 = ArsUser::find()
                ->where(['id'=>$userid])
                ->one();
        
        $model3 = ArsAccommodation::find()
                ->where(['id'=>$id])
                ->one();
        $model4 = ArsUser::find()
                ->where(['id'=>$model3->user_id])
                ->one();

        $model->book_date = date('d/m/Y');
        $model->acc_id = $id;
        $model->user_id = $userid;
        $model->book_status = 'Pending';

        if ($model->validate()) {
            Yii::$app->mailer->compose()
                ->setTo($model4->user_email)
                ->setFrom('arentalsystem@gmail.com')
                ->setSubject("Accommodation Rental System Booking")
                ->setTextBody('Plain text content')
                ->setHtmlBody('<p>Hi Landlord,<br><br>You have just received a booking of home rentals from '.$model2->user_name.' located at '.$model3->acc_address.'. For the acceptance process and see the details of the information booking, you be required to log in to the <a href="http://localhost/ars/web/index.php">Accommodation Rental System</a> and you need to accept or reject the booking that have been done by the prospective tenant.<br><br>This is an automatic email from the system Accommodation Rental System. You are not allowed to reply to this email. If there are any problems, you are advised to contact the administrator system.<br><br>Best Regards,<br>Accommodation Rental System.</p>')
                ->send();
            Yii::$app->session->setFlash('emailConfirmbook','Your booking has been received. Please refer to the email time to time to find out the status of your reservation.');

            $model->save();
            return $this->redirect(['ars-booking/status']);
        }

    }
    /**
     * Creates a new ArsBooking model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ArsBooking();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing ArsBooking model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing ArsBooking model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['status']);
    }

    /**
     * Finds the ArsBooking model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ArsBooking the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ArsBooking::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    public function actionAdvertise(){

        $searchModel = new AdvertiseSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('advertise', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionApprove($id)
    {
        $model = $this->findModel($id);
        
        $model2 = ArsUser::find()
                ->where(['id'=>$model->user_id])
                ->one();
        $model3 = ArsAccommodation::find()
                ->where(['id'=>$model->acc_id])
                ->one();
        $model->book_status = 'Accepted';

         if ($model->validate()) {
            Yii::$app->mailer->compose()
                ->setTo($model2->user_email)
                ->setFrom('arentalsystem@gmail.com')
                ->setSubject("Accommodation Rental System Booking")
                ->setTextBody('Plain text content')
                ->setHtmlBody('<p>Congratulation,<br><br>You accommodation rental application which located at '.$model3->acc_address.' has been approved by the landlord. The landlord will contact you soon.<br><br>This is an automatic email from the system Accommodation Rental System. You are not allowed to reply to this email. If there are any problems, you are advised to contact the administrator system.<br><br>Best Regards,<br>Accommodation Rental System.</p>')
                ->send();
             $model->save();
             Yii::$app->getSession()->setFlash('approve', 'Booking has been Accepted');
                return $this->redirect(['ars-booking/index']);
         }
         else{
            Yii::$app->getSession()->setFlash('errorAccept', 'Sorry, there are fewer error to be fixed.');
                return $this->redirect(['ars-booking/view','id'=>$id]);
         }
    }
    public function actionReject($id)
    {
         $model = $this->findModel($id);

         $model2 = ArsUser::find()
                ->where(['id'=>$model->user_id])
                ->one();
        $model3 = ArsAccommodation::find()
                ->where(['id'=>$model->acc_id])
                ->one();

         $model->book_status = 'Rejected';
         if ($model->validate()) {
            Yii::$app->mailer->compose()
                ->setTo($model2->user_email)
                ->setFrom('arentalsystem@gmail.com')
                ->setSubject("Accommodation Rental System Booking")
                ->setTextBody('Plain text content')
                ->setHtmlBody('<p>We are sorry, your rental application which located at '.$model3->acc_address.' is not successful. You can still find other accommodation in the <a href="http://localhost/ars/web/index.php">Accommodation Rental System</a>.<br><br>This is an automatic email from the system Accommodation Rental System. You are not allowed to reply to this email. If there are any problems, you are advised to contact the administrator system.<br><br>Best Regards,<br>Accommodation Rental System.</p>')
                ->send();
             $model->save();
             Yii::$app->getSession()->setFlash('reject', 'Booking has been Rejected');
                return $this->redirect(['ars-booking/index']);
         }
         else{
            Yii::$app->getSession()->setFlash('errorAccept', 'Sorry, there are fewer error to be fixed.');
                return $this->redirect(['ars-booking/view','id'=>$id]);
         }
    }
}
