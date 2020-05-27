<?php

namespace common\modules\projectexchange\controllers;

use Yii;
use common\modules\projectexchange\models\Project;
use common\modules\projectexchange\models\TeamPersonlink;
use common\modules\projectexchange\models\searches\ProjectSearch;
use common\modules\projectexchange\models\searches\TeamPersonlinkSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\modules\projectexchange\models\ProjectTaglink;
use yii\web\UploadedFile;
use common\components\helpers\Upload;

/**
 * ProjectController implements the CRUD actions for Project model.
 */
class ProjectController extends Controller
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
     * Lists all Project models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProjectSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionIndexall()
    {
        $searchModel = new ProjectSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        // var_dump($dataProvider->getModels());die;
        return $this->render('indexall', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionIndexmy()
    {
        $searchModel = new ProjectSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        // var_dump($dataProvider->getModels());die;
        return $this->render('indexall', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Project model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $memberSearchModel = new TeamPersonlinkSearch;
        $memberDataProvider = $memberSearchModel->search(['TeamPersonlinkSearch'=>['TeamID' => $model->TeamID]]);
        
        return $this->render('view', [
            'model' => $model,
            'memberSearchModel' => $memberSearchModel,
            'memberDataProvider' => $memberDataProvider
        ]);
    }

    /**
     * Creates a new Project model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Project();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ID]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionAddmember($id)
    {
        $project = $this->findModel($id);
        $model = new TeamPersonlink;
        // Yii::$app->cache->flush();
        if ($model->load(Yii::$app->request->post())  && $model->save()) {
            return $this->redirect(['view', 'id' => $project->ID]);
        }

        $model->TeamID = $project->TeamID;

        return $this->render('_form_member', [
            'model' => $model,
        ]);
    }
    public function actionAddtag($id)
    {
        $project = $this->findModel($id);
        $model = new ProjectTaglink;
        // Yii::$app->cache->flush();
        if ($model->load(Yii::$app->request->post())  && $model->save()) {
            return $this->redirect(['view', 'id' => $project->ID]);
        }

        $model->ProjectParentID = $project->ParentID;

        return $this->render('_form_tag', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Project model.
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
     * Deletes an existing Project model.
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
     * Finds the Project model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Project the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Project::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('ML', 'The requested page does not exist.'));
    }

    // Yii::getAlias('@uploads').'/'.$this->Img
    public function actionShowimage($id){
        $project = Project::findOne($id);
        header('Content-type: image/jpeg; charset=windows-1251');
        try{
            $img = file_get_contents(Yii::getAlias('@uploads').'/'.$project->Img);
        } catch (\Throwable $th) {
            $img = file_get_contents(Yii::getAlias('@media').'/img/test.jpg');
        }
        if(!$img){
            echo '';
        }else{
            try {
                echo pack('H*', $img );
            } catch (\Throwable $th) {
                echo $img;
            }
            
        }
    }
}
