<?php

namespace common\modules\projectexchange\controllers;

use Yii;
use common\modules\projectexchange\models\RequestEntry;
use common\modules\projectexchange\models\searches\RequestEntrySearch;
use common\modules\projectexchange\models\searches\RequestentryuserSearch;
use common\modules\projectexchange\models\searches\RequestentrymoderatorSearch;
use common\modules\projectexchange\models\TeamPersonlink;
use common\modules\projectexchange\models\Project;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * RequestEntryController implements the CRUD actions for RequestEntry model.
 */
class RequestentryController extends Controller
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
     * Lists all RequestEntry models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new RequestEntrySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionIndexuser()
    {
        $searchModel = new RequestentryuserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index_user', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionIndexmoderator()
    {
        $searchModel = new RequestentrymoderatorSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index_moderator', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    /**
     * Displays a single RequestEntry model.
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

    public function actionViewmoderator($id)
    {
        return $this->render('view_moderator', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionApprovemoderator($id)
    {
        $requestentry = $this->findModel($id);
        $project = Project::find()->where(['ParentID'=>$requestentry->ProjectParentID, 'IsActual'=>1])->one();
        $model = new TeamPersonlink;
        // Yii::$app->cache->flush();
        if ($model->load(Yii::$app->request->post())  && $model->save()) {
            $requestentry->StatusID = 3;
            $requestentry->save();
            return $this->redirect(['view', 'id' => $requestentry->ID]);
        }

        $model->TeamID = $project->TeamID;
        $model->PersonID = $requestentry->PersonID;

        return $this->render('_form_member_entry', [
            'model' => $model,
        ]);
    }
    public function actionDeclinemoderator($id)
    {
        $model = $this->findModel($id);
        $model->StatusID = 4;
        $model->save();
        return $this->redirect(['indexmoderator']);
    }
    public function actionBacktoupdate($id)
    {
        $model = $this->findModel($id);
        $model->StatusID = 1;
        $model->save();
        
        return $this->redirect(['indexmoderator']);
    }

    /**
     * Creates a new RequestEntry model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id=null)
    { $project = Project::findOne($id);
        $projparentid = $project ? $project->ParentID : null;
       $model = new RequestEntry();
       $model->ProjectParentID = $projparentid;
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ID]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing RequestEntry model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ID]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing RequestEntry model.
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
    public function actionApprove($id)
    {
        $model = $this->findModel($id);
        $model->StatusID = 2;
        $model->save();

        return $this->redirect(['view', 'id'=>$model->ID]);
    }

    /**
     * Finds the RequestEntry model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return RequestEntry the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = RequestEntry::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('ML', 'The requested page does not exist.'));
    }
}
