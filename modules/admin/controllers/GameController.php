<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\Game;
use app\models\Reserve;
use app\models\GameSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\UploadedFile;
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
           'only' => ['create', 'update', 'view', 'delete','index','weekendreserve'],
           'rules' => [

               [
                   'actions' => ['create','update','view','delete','index','weekendreserve'],
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
                $model->landing_picture=$oldbackground;
                    
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
        public function actionWeekendreserve($id){
        $game = $this->findModel($id);
        $duration=$game->duration;
        $space_time=$game->space_time;
        $start_time=$game->start_time;
        for($i=1;$i<=63;$i++){
        $band=0;
        $last=Reserve::find()->orderBy(['id' => SORT_DESC])->where(['game_id'=>$id])->one();
        if($last){
         $end_date=$last->end_date;   
        }else{
            $band=1;
            $end_date=date("Y-m-d $start_time",strtotime(date('Y-m-d')));
        }
           
        if(date('H:i:s',strtotime($end_date))==$game->end_time){
        $start_date=date('Y-m-d H:i:s',strtotime("+10 hours",strtotime($end_date)));
        $start_date=date("Y-m-d $start_time",strtotime($start_date));
        //$start_date=date('Y-m-d H:i:s',strtotime("+11 hours",strtotime($last->end_date)));
        }else{
            if($band==0){
                $start_date=date('Y-m-d H:i:s',strtotime($space_time,strtotime($end_date))); 
            }else{
              $start_date=date('Y-m-d H:i:s',strtotime($end_date));   
            }
        
        }
         $model=New Reserve;;
         $model->start_date=$start_date;
         $aux2=date('Y-m-d H:i:s',strtotime($duration,strtotime($start_date)));
         $model->end_date=$aux2; 
         $model->status='OPEN';
          $model->game_id=$id;
          $model->description='HORARIO';
          $model->save();
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
