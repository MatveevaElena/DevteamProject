<?php

namespace common\modules\news\controllers;

use Yii;
use common\modules\news\models\News;
use common\modules\news\models\searches\NewsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use common\components\helpers\Upload;

/**
 * NewsController implements the CRUD actions for News model.
 */
class NewsController extends Controller
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
     * Lists all News models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new NewsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single News model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $model->increaseViewCount();

        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new News model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new News();

        if ($model->load(Yii::$app->request->post())) {
            if(($fileInstence = UploadedFile:: getInstance($model, 'Img')))
            { 
                $model->Img = Upload::file($fileInstence, 'news', true);
            }
            if($model->save()){
                return $this->redirect(['view', 'id' => $model->ID]);
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing News model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            if(($fileInstence = UploadedFile:: getInstance($model, 'Img')))
            { 
                $model->Img = Upload::file($fileInstence, 'news', true);
            }
            if($model->save()){
                return $this->redirect(['view', 'id' => $model->ID]);
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing News model.
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
     * Finds the News model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return News the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = News::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('ML', 'The requested page does not exist.'));
    }

    public function actionShowimage($id){
        $news = News::findOne($id);
        header('Content-type: image/jpeg; charset=windows-1251');
        try{
            $img = file_get_contents(Yii::getAlias('@uploads').'/'.$news->Img);
        } catch (\Throwable $th) {
            $img = file_get_contents(Yii::getAlias('@media').'/img/news.jpg');
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
