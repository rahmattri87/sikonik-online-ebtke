<?php

namespace backend\controllers;

use Yii;
use backend\models\Subind1k4t0r3ntr1;
use backend\models\Subind1k4t0r3ntr1Search;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use \yii\web\Response;
use yii\helpers\Html;
use yii\filters\AccessControl;
use backend\models\Ind1k4t0r; 
use backend\models\Subind1k4t0r; 


/**
 * Subind1k4t0r3ntr1Controller implements the CRUD actions for Subind1k4t0r3ntr1 model.
 */
class Subind1k4t0r3ntr1Controller extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout','index'],
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actionLists($id) {
        $countPosts = Subind1k4t0r::find()
             ->where(['id_indikator' => $id])
             ->count();
        $posts = Subind1k4t0r::find()
             ->where(['id_indikator' => $id])
             ->orderBy('id_sub_indikator ASC')
             ->all();
        if($countPosts>0) {
             foreach($posts as $post){
                  echo "<option value='".$post->id_sub_indikator."'>".$post->id_sub_indikator." - ".$post->uraian_keberhasilan."</option>";
             }
        }
        else{
             echo "<option>-</option>";
        }
   }

   public function actionGettarget($id) {
    $countPosts = Subind1k4t0r::find()
         ->where(['id_sub_indikator' => $id])
         ->count();
    $posts = Subind1k4t0r::find()
         ->where(['id_sub_indikator' => $id])
         ->orderBy('id_sub_indikator ASC')
         ->all();
    if($countPosts>0) {
         foreach($posts as $post){              
              echo "<div class='form-group field-idtarget'>
                        <label class='control-label' for='idtarget'>Target Indikator Keberhasilan</label>
                        <input type='text' id='idtarget' class='form-control' name='idtarget' value='".$post->target."' disabled=''>
                        <div class='help-block'></div>
                    </div>";
         }
    }
    else{
         echo "xxxxxx";
    }
}

    /**
     * Lists all Subind1k4t0r3ntr1 models.
     * @return mixed
     */
    public function actionIndex()
    {    
        $searchModel = new Subind1k4t0r3ntr1Search();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    /**
     * Displays a single Subind1k4t0r3ntr1 model.
     * @param string $id_sub_indikator
     * @param resource $tahun
     * @return mixed
     */
    public function actionView($id_sub_indikator, $tahun)
    {   
        $request = Yii::$app->request;
        if($request->isAjax){
            Yii::$app->response->format = Response::FORMAT_JSON;
            return [
                    'title'=> "Subind1k4t0r3ntr1 #".$id_sub_indikator, $tahun,
                    'content'=>$this->renderAjax('view', [
                        'model' => $this->findModel($id_sub_indikator, $tahun),
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                            Html::a('Edit',['update','id_sub_indikator, $tahun'=>$id_sub_indikator, $tahun],['class'=>'btn btn-primary','role'=>'modal-remote'])
                ];    
        }else{
            return $this->render('view', [
                'model' => $this->findModel('DKA17001.3', '2017'),
            ]);
        }
    }

    /**
     * Creates a new Subind1k4t0r3ntr1 model.
     * For ajax request will return json object
     * and for non-ajax request if creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $request = Yii::$app->request;
        $model = new Subind1k4t0r3ntr1();  

        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if($request->isGet){
                return [
                    'title'=> "Create new Subind1k4t0r3ntr1",
                    'content'=>$this->renderAjax('create', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                                Html::button('Save',['class'=>'btn btn-primary','type'=>"submit"])
        
                ];         
            }else if($model->load($request->post()) && $model->save()){
                return [
                    'forceReload'=>'#crud-datatable-pjax',
                    'title'=> "Create new Subind1k4t0r3ntr1",
                    'content'=>'<span class="text-success">Create Subind1k4t0r3ntr1 success</span>',
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                            Html::a('Create More',['create'],['class'=>'btn btn-primary','role'=>'modal-remote'])
        
                ];         
            }else{           
                return [
                    'title'=> "Create new Subind1k4t0r3ntr1",
                    'content'=>$this->renderAjax('create', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                                Html::button('Save',['class'=>'btn btn-primary','type'=>"submit"])
        
                ];         
            }
        }else{
            /*
            *   Process for non-ajax request
            */
            if ($model->load($request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_sub_indikator' => $model->id_sub_indikator, 'tahun' => $model->tahun]);
            } else {
                return $this->render('create', [
                    'model' => $model,
                ]);
            }
        }
       
    }

    /**
     * Updates an existing Subind1k4t0r3ntr1 model.
     * For ajax request will return json object
     * and for non-ajax request if update is successful, the browser will be redirected to the 'view' page.
     * @param string $id_sub_indikator
     * @param resource $tahun
     * @return mixed
     */
    public function actionUpdate($id_sub_indikator, $tahun)
    {
        $request = Yii::$app->request;
        $model = $this->findModel($id_sub_indikator, $tahun);       

        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if($request->isGet){
                return [
                    'title'=> "Update Subind1k4t0r3ntr1 #".$id_sub_indikator, $tahun,
                    'content'=>$this->renderAjax('update', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                                Html::button('Save',['class'=>'btn btn-primary','type'=>"submit"])
                ];         
            }else if($model->load($request->post()) && $model->save()){
                return [
                    'forceReload'=>'#crud-datatable-pjax',
                    'title'=> "Subind1k4t0r3ntr1 #".$id_sub_indikator, $tahun,
                    'content'=>$this->renderAjax('view', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                            Html::a('Edit',['update','id_sub_indikator, $tahun'=>$id_sub_indikator, $tahun],['class'=>'btn btn-primary','role'=>'modal-remote'])
                ];    
            }else{
                 return [
                    'title'=> "Update Subind1k4t0r3ntr1 #".$id_sub_indikator, $tahun,
                    'content'=>$this->renderAjax('update', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                                Html::button('Save',['class'=>'btn btn-primary','type'=>"submit"])
                ];        
            }
        }else{
            /*
            *   Process for non-ajax request
            */
            if ($model->load($request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_sub_indikator' => $model->id_sub_indikator, 'tahun' => $model->tahun]);
            } else {
                return $this->render('update', [
                    'model' => $model,
                ]);
            }
        }
    }

    /**
     * Delete an existing Subind1k4t0r3ntr1 model.
     * For ajax request will return json object
     * and for non-ajax request if deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id_sub_indikator
     * @param resource $tahun
     * @return mixed
     */
    public function actionDelete($id_sub_indikator, $tahun)
    {
        $request = Yii::$app->request;
        $this->findModel($id_sub_indikator, $tahun)->delete();

        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ['forceClose'=>true,'forceReload'=>'#crud-datatable-pjax'];
        }else{
            /*
            *   Process for non-ajax request
            */
            return $this->redirect(['index']);
        }


    }

     /**
     * Delete multiple existing Subind1k4t0r3ntr1 model.
     * For ajax request will return json object
     * and for non-ajax request if deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id_sub_indikator
     * @param resource $tahun
     * @return mixed
     */
    public function actionBulkdelete()
    {        
        $request = Yii::$app->request;
        $pks = explode(',', $request->post( 'pks' )); // Array or selected records primary keys
        foreach ( $pks as $pk ) {
            $model = $this->findModel($pk);
            $model->delete();
        }

        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ['forceClose'=>true,'forceReload'=>'#crud-datatable-pjax'];
        }else{
            /*
            *   Process for non-ajax request
            */
            return $this->redirect(['index']);
        }
       
    }

    /**
     * Finds the Subind1k4t0r3ntr1 model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id_sub_indikator
     * @param resource $tahun
     * @return Subind1k4t0r3ntr1 the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_sub_indikator, $tahun)
    {
        if (($model = Subind1k4t0r3ntr1::findOne(['id_sub_indikator' => $id_sub_indikator, 'tahun' => $tahun])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
