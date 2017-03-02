<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\Content;
use app\models\ContentSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\UploadedFile;
/**
 * ContentController implements the CRUD actions for Content model.
 */
class ContentController extends Controller
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
     * Lists all Content models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ContentSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Content model.
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
     * Creates a new Content model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
 public function actionCreate()
    {
        $model = new Content();
        if ($model->load(Yii::$app->request->post())) {
                $picture=UploadedFile::getInstance($model,'picture');
            if($picture!=NULL){
                $name1=date('Y_m_d_H_i_s_'). $picture->baseName .'.' . $picture->extension;
                $model->picture=$name1;
                $picture->saveAs('images/'.$name1);

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
     * Updates an existing Content model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

            $oldpicture=$model->picture;
               if ($model->load(Yii::$app->request->post())) {

                $picture=UploadedFile::getInstance($model,'picture');
            if($picture!=NULL){
                $name1=date('Y_m_d_H_i_s_'). $picture->baseName .'.' . $picture->extension;
                $model->picture=$name1;
                $picture->saveAs('images/'.$name1);

            }else{
                $model->picture=$oldpicture;
                    
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
     * Deletes an existing Content model.
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
     * Finds the Content model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Content the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Content::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
