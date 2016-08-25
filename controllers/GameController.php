<?php

namespace app\controllers;

use Yii;
use app\models\Game;
use app\models\Reserve;
use app\models\GameSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Url;
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
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }



    /**
     * Displays a single Game model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $this->layout="main2";
        $events = array();
        $aux=Reserve::find()->where(['game_id'=>$id,'status'=>'OPEN'])->all();
foreach($aux as $k => $reserve){
    $date=date('Y-m-d H:i:s',strtotime($reserve->start_date));
     $date2=date('Y-m-d\Th:i:s\Z',strtotime($reserve->end_date));
   $Event = new \yii2fullcalendar\models\Event();
  $Event->id = $reserve->id;
  $Event->title = $reserve->description;
  $Event->start = $reserve->start_date;
    $Event->end = $reserve->end_date;
    $Event->url = Url::to(['game/reserve','id'=>$reserve->id]);
  $events[] = $Event;   
}

 
        return $this->render('view', [
            'model' => $this->findModel($id),'events'=>$events
        ]);
    }
    public function actionReserve($id)
    {
        $this->layout="main2";
        die("Entró");
        return $this->render('reserve', [
            'model' => $this->findModel($id),
        ]);
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
