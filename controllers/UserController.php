<?php

namespace app\controllers;

use Yii;
use app\models\User;
use app\models\UserSearch;
use app\models\Address;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use DateTime;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\data\Pagination;

/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller
{
    /**
     * {@inheritdoc}
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
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $pagination = new Pagination([
            'defaultPageSize' => 5,
            'totalCount' => User::find()->count(),
        ]);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'pagination' => $pagination,
        ]);
    }

    /**
     * Displays a single User model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $user = $this->findModel($id);
        $user->date = Yii::$app->formatter->asDateTime($user->date, 'Y-m-d H:i:s');
        // die(print_r($user->getAddresses()));
        $addresses = Address::find()->where(['user_id' => $user->id])->all();
        return $this->render('view', [
            'user' => $user,
            'addresses' => $addresses
        ]);
    }

    /**
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $user = new User();
        $address = new Address();

        // $user->scenario = 'create';
        // $address->scenario = 'create';

        if($user->load(Yii::$app->request->post()) && $address->load(Yii::$app->request->post())) {
            // $date = new DateTime();
            // die(Yii::$app->formatter->asTimeStamp('now'));
            $user->date = Yii::$app->formatter->asTimeStamp('now');
            // $user->date = Yii::$app->formatter->asDateTime('now', 'Y-m-d H:i:s');
            $isValid = $user->validate();
            $isValid = $address->validate() && $isValid;
            if($isValid) {
                $user->save(false);
                $address->user_id = $user->id;
                $address->save(false);
                return $this->redirect(['view', 'id' => $user->id]);
            }
        }

        return $this->render('create', [
            'user' => $user,
            'address' => $address,
        ]);
    }

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $user = $this->findModel($id);

        if ($user->load(Yii::$app->request->post()) && $user->save()) {
            return $this->redirect(['view', 'id' => $user->id]);
        }

        return $this->render('update', [
            'user' => $user,
        ]);
    }

    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($user = User::findOne($id)) !== null) {
            return $user;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
