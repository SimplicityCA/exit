<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\Game;
use app\models\GameSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
/**
 * GameController implements the CRUD actions for Game model.
 */
class GameController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
                'access' => [
           'class' => AccessControl::className(),
           'only' => ['create', 'update', 'view', 'delete','index'],
           'rules' => [

               [
                   'actions' => ['create','update','view','delete','index'],
                   'allow' => true,
                   'roles' => ['@'],
               ],
           ],
       ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Game models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new GameSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Game model.
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
     * Creates a new Game model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Game();
        if ($model->load(Yii::$app->request->post())) {
               $picture=UploadedFile::getInstance($model,'picture');
            if($picture!=NULL){
                $name1=date('Y_m_d_H_i_s_'). $picture->baseName .'.' . $picture->extension;
                $model->picture=$name1;
                $picture->saveAs('images/game/'.$name1);

            }
                 $background1=UploadedFile::getInstance($model,'landing_picture');
            if($background1!=NULL){
                $name2=date('Y_m_d_H_i_s_'). $background1->baseName .'.' . $background1->extension;
                $model->landing_picture=$name2;
                $background1->saveAs('images/game/'.$name2);

            }
            if($model->save()){
                return $this->redirect(['view', 'id' => $model->id]);
 
            }else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Game model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
 public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $oldpicture=$model->picture;
        $oldbackground=$model->landing_picture;
          if ($model->load(Yii::$app->request->post())) {
               $picture=UploadedFile::getInstance($model,'picture');
            if($picture!=NULL){
                $name1=date('Y_m_d_H_i_s_'). $picture->baseName .'.' . $picture->extension;
                $model->picture=$name1;
                $picture->saveAs('images/game/'.$name1);

            }else{
                $model->picture=$oldpicture;
                    
            }
                 $background1=UploadedFile::getInstance($model,'landing_picture');
            if($background1!=NULL){
                $name2=date('Y_m_d_H_i_s_'). $background1->baseName .'.' . $background1->extension;
                $model->landing_picture=$name2;
                $background1->saveAs('images/game/'.$name2);

            }else{
                $model->background1=$oldbackground;
                    
            }
            
            if($model->save()){
                return $this->redirect(['view', 'id' => $model->id]);
 
            }else {
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
     * Deletes an existing Game model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Game model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Game the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Game::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
