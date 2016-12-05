<?php

namespace app\controllers;

use Yii;
use app\models\ArsAccommodation;
use app\models\ArsAccommodationSearch;
use app\models\ArsUser;
use app\models\ArsBooking;
use app\models\ArsPasswordReference;
use app\models\ArsImageAccommodation;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\UploadedFile;
/**
 * ArsAccommodationController implements the CRUD actions for ArsAccommodation model.
 */
class ArsAccommodationController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['create', 'update','view','dashboardLandlord'],
                'rules' => [
                    [
                       // 'actions' => ['logout','index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all ArsAccommodation models.
     * @return mixed
     */
    public function actionIndex()
    {
        $model = ArsBooking::find()
                ->where(['book_status' =>'Pending'])
                ->count();
        $searchModel = new ArsAccommodationSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model'=>$model,
        ]);
    }

    /**
     * Displays a single ArsAccommodation model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new ArsAccommodation model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ArsAccommodation();
        //$models = [new ArsImageAccommodation];

        $userid = Yii::$app->user->identity->id;

        if ($model->load(Yii::$app->request->post())) {
            $model->acc_dateAdded=date('d/m/Y');
            $model->acc_state = "Selangor";
            $model->acc_city = "Shah Alam";
            $model->acc_status = "Publish";
            $model->user_id = $userid;

            $model->file = UploadedFile::getInstance($model,'file');
            if ($model->validate()) {
                $model->file->saveAs('images/'. $model->file);

                $model->acc_image = 'images/'.$model->file;
                $model->save();

                Yii::$app->getSession()->setFlash('addAcc', 'Information Successfully Saved');
                return $this->redirect(['ars-accommodation/index']);
            }
            else{
                return $this->render('create', [
                    'model' => $model,
                    //'models' => (empty($models)) ? [new ArsImageAccommodation] : $models,
                ]);
            }
            
        } else {
            return $this->render('create', [
                'model' => $model,
                //'models' => (empty($models)) ? [new ArsImageAccommodation] : $models,
            ]);
        }
    }

    /**
     * Updates an existing ArsAccommodation model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
             if(isset($_POST['ArsAccommodation']['acc_title'])) {
                if($model->save()){
                    Yii::$app->getSession()->setFlash('addAcc', 'Information Successfully Updated');
                    return $this->redirect(['ars-accommodation/index']);
                }
                else{
                    return $this->render('update', [
                        'model' => $model,
                    ]);
                }
                
                
            }
            else if(isset($_POST['ArsAccommodation']['acc_status'])){

                if($model->save()){

                    Yii::$app->getSession()->setFlash('addAcc', 'Status Successfully Changed');
                    return $this->redirect(['ars-accommodation/index']);
                }
                else{
                    return $this->render('update', [
                        'model' => $model,
                    ]);
                }
            }
            else if (isset($_POST['ArsAccommodation']['file'])) {
                unlink($model->acc_image);
                $model->file = UploadedFile::getInstance($model,'file');
                if ($model->validate()) {
                    $model->file->saveAs('images/'. $model->file);

                    $model->acc_image = 'images/'.$model->file;
                    $model->save();

                    Yii::$app->getSession()->setFlash('addAcc', 'Image Successfully Changed');
                    return $this->redirect(['ars-accommodation/index']);
                }
                
            }
            else {
                    return $this->render('update', [
                    'model' => $model,
                ]);
            }
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing ArsAccommodation model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        Yii::$app->getSession()->setFlash('addAcc', 'Information has been deleted');
        return $this->redirect(['index']);
    }

    /**
     * Finds the ArsAccommodation model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ArsAccommodation the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ArsAccommodation::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    public function actionDashboardlandlord()
    {   
        $model = ArsAccommodation::find()
            ->one();
        return $this->render('dashboardlandlord', [
            'model' => $model,
        ]);
    }
    public function actionProfile()
    {   $userid = Yii::$app->user->identity->id;
        $model = ArsUser::find() //find user info in ars-user table
            ->where(['id'=>$userid])
            ->one();

        $model2 = ArsPasswordReference::find()
            ->where(['user_id'=>$userid])
            ->one();

        $model3 = ArsBooking::find()
                ->where(['book_status' =>'Pending'])
                ->count();

        if ($model->load(Yii::$app->request->post())) {
            if(isset($_POST['ArsUser']['user_name'])) {
                if($model->save()){
                    Yii::$app->getSession()->setFlash('profileupdate', 'Profile Successfully Updated');
                    return $this->redirect(['ars-accommodation/profile']);
                }
                else{
                    $model->password_hash = "";
                    return $this->render('profile', [
                        'model' => $model,
                        'model2'=>$model2,
                        'model3'=>$model3,
                    ]);
                }
                
                
            }
            else if(isset($_POST['ArsUser']['password_hash'])){
                $model->password_hash = Yii::$app->security->generatePasswordHash($_POST['ArsUser']['password_hash']);
                $model->auth_key = Yii::$app->security->generateRandomString(); 

                if($model->save()){
                    $last_id = $userid;
                    $model2->password_reference = $_POST['ArsUser']['password_hash'];
                    $model2->user_id = $last_id;
                    $model2->save();
                    Yii::$app->getSession()->setFlash('profileupdate', 'Password Successfully Changed');
                    return $this->redirect(['ars-accommodation/profile']);
                }
                else{
                    $model->password_hash = "";
                    return $this->render('profile', [
                        'model' => $model,
                        'model2'=>$model2,
                        'model3'=>$model3,
                    ]);
                }
            }
            else {
                    $model->password_hash = "";
                    return $this->render('profile', [
                    'model' => $model,
                    'model2'=>$model2,
                    'model3'=>$model3,
                ]);
            }

            
        } else {
            $model->password_hash = "";
            return $this->render('profile', [
            'model' => $model,
            'model2'=>$model2,
            'model3'=>$model3,
        ]);
        }
        
    }
    public function actionDashboardstudent(){
        return $this->render('dashboardstudent');
    }
}
