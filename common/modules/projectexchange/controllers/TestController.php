<?php

namespace common\modules\projectexchange\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\modules\projectexchange\models\Project;
use common\modules\projectexchange\models\RequestEntry;

class TestController extends Controller
{

    public function actionIndex(){
        
        $aaa = [1,2,3,4,5];
        $bbb = 'String';
        
        // $models = Yii::$app->db->createCommand("
        //     select * from project
        // ")->queryOne();
        $models = Yii::$app->db->createCommand("
            select * from project
        ")->queryAll();
        Yii::$app->db->createCommand("
            update project set Name = Name where ID = 1
        ")->execute();

        

        // ActiveRecord
        // $models = Project::find()->asArray()->all();

        return $this->render('index_view', [
            'a' => $aaa,
            'b' => $bbb,
            'projects' => $models
        ]);

    }

    public function actionApplication($id){
        
        // $_POST
        // Yii::$app->user;
        // var_dump(Yii::$app->user->identity->username);
        // die;
        $model = new RequestEntry;
        $model->ProjectParentID = $id;
        // return $this->redirect('index',[]); Вызвать обработчик actionIndex в этом же контроллере
        // return $this->render('index',['var'=>$data]); Отрисовать представление views/имяконтроллера/index
        return $this->render('../requestentry/_form',[
            'model' => $model
        ]);

    }

}
