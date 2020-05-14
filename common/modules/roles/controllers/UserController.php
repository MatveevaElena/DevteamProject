<?php

namespace common\modules\roles\Controllers;

use Yii;
use common\modules\roles\models\User;
use common\modules\roles\models\UserRole;
use common\modules\roles\models\UserRoleLink;
use common\modules\roles\models\searches\UserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

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

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
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
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new User();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionRoles($id)
    {
        $user_model = $this->findModel($id);
        $roles = ArrayHelper::map(UserRole::find()->asArray()->all(),'ID','Name');
        $user_roles = array_column(UserRoleLink::find()->where(['UserID' => $user_model->id])->asArray()->all(),'RoleID');
        
        if ($user_model->load(Yii::$app->request->post())) {
            $user_model->UserRoles = $user_model->UserRoles ? $user_model->UserRoles : [];
            foreach($user_model->UserRoles as $role){
                if(!in_array($role,$user_roles)){
                    $model = new UserRoleLink;
                    $model->UserID = $user_model->id;
                    $model->RoleID = $role;
                    $model->save();
                }//save
            }
            foreach($user_roles as $role){
                if(!in_array($role,$user_model->UserRoles)){
                    $model = UserRoleLink::find()->where(['UserID' => $user_model->id,'RoleID'=>$role])->one();
                    $model->delete();
                }//delete
            }
        }

        $user_model->UserRoles = $user_roles = array_column(UserRoleLink::find()->where(['UserID' => $user_model->id])->asArray()->all(),'RoleID');
        // var_dump($user_roles);die;
        return $this->render('roles', [
            'user' => $user_model,
            'roles' => $roles,
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
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
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
        if (($model = User::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
