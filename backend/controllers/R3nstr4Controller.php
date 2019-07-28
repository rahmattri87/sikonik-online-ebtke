<?php

namespace backend\controllers;

use Yii;
use backend\models\R3nstr4;
use backend\models\R3nstr4Search;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use \yii\web\Response;
use yii\helpers\Html;

use app\components\AccessRule;
use yii\filters\AccessControl;
use yii\web\UploadedFile;

use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;
/**
 * R3nstr4Controller implements the CRUD actions for R3nstr4 model.
 */
class R3nstr4Controller extends Controller
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
    

    /**
     * Lists all R3nstr4 models.
     * @return mixed
     */
    public function actionIndex()
    {    
        $searchModel = new R3nstr4Search();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);                  

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,            
        ]);
    }


    /**
     * Displays a single R3nstr4 model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {   
        $request = Yii::$app->request;
        if($request->isAjax){
            Yii::$app->response->format = Response::FORMAT_JSON;
            return [
                    'title'=> "R3nstr4 #".$id,
                    'content'=>$this->renderAjax('view', [
                        'model' => $this->findModel($id),
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                            Html::a('Edit',['update','id'=>$id],['class'=>'btn btn-primary','role'=>'modal-remote'])
                ];    
        }else{
            return $this->render('view', [
                'model' => $this->findModel($id),
            ]);
        }
    }

    

    /**
     * Creates a new R3nstr4 model.
     * For ajax request will return json object
     * and for non-ajax request if creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $request = Yii::$app->request;
        $model = new R3nstr4();  

        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if($request->isGet){
                return [
                    'title'=> "Create new R3nstr4",
                    'content'=>$this->renderAjax('create', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                                Html::button('Save',['class'=>'btn btn-primary','type'=>"submit"])
        
                ];         
            }else if($model->load($request->post())){
                $image = UploadedFile::getInstance($model, 'image');
                if (!is_null($image)) {
                    $model->cover_src_filename = $image->name;
                    $ext = explode(".", $image->name);                    
                    $model->cover_web_filename = Yii::$app->security->generateRandomString().$image->name;                    

                    Yii::$app->params['uploadPath'] = Yii::$app->basePath . '/web/uploads/cover/';
                    $path = Yii::$app->params['uploadPath'].$model->cover_web_filename;
                    $image->saveAs($path);
                }

                $pdf = UploadedFile::getInstance($model, 'pdf');
                if (!is_null($pdf)) {
                    $model->file_src_filename = $pdf->name;
                    $ext = explode(".", $pdf->name);                    
                    $model->file_web_filename = str_replace(" ", "", Yii::$app->security->generateRandomString().$pdf->name);

                    Yii::$app->params['uploadPath'] = Yii::$app->basePath . '/web/uploads/pdf/';
                    $path = Yii::$app->params['uploadPath'].$model->file_web_filename;
                    $pdf->saveAs($path);
                }

                if ($model->save()) {             
                    return [
                        'forceReload'=>'#crud-datatable-pjax',
                        'title'=> "Create new R3nstr4",
                        'content'=>'<span class="text-success">Create R3nstr4 success</span>',
                        'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                        Html::a('Create More',['create'],['class'=>'btn btn-primary','role'=>'modal-remote'])            
                    ];
                }  else {
                    var_dump ($model->getErrors()); die();
                }                    
            }else{           
                return [
                    'title'=> "Create new R3nstr4",
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
                return $this->redirect(['view', 'id' => $model->id_renstra]);
            } else {
                return $this->render('create', [
                    'model' => $model,
                ]);
            }
        }
       
    }

    /**
     * Updates an existing R3nstr4 model.
     * For ajax request will return json object
     * and for non-ajax request if update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $request = Yii::$app->request;
        $model = $this->findModel($id);       

        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if($request->isGet){
                return [
                    'title'=> "Update R3nstr4 #".$id,
                    'content'=>$this->renderAjax('update', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                                Html::button('Save',['class'=>'btn btn-primary','type'=>"submit"])
                ];         
            }else if($model->load($request->post())){
                $image = UploadedFile::getInstance($model, 'image');
                if (!is_null($image)) {
                    $model->cover_src_filename = $image->name;
                    $ext = explode(".", $image->name);                    
                    $model->cover_web_filename = Yii::$app->security->generateRandomString().$image->name;                    

                    Yii::$app->params['uploadPath'] = Yii::$app->basePath . '/web/uploads/cover/';
                    $path = Yii::$app->params['uploadPath'].$model->cover_web_filename;
                    $image->saveAs($path);
                }

                $pdf = UploadedFile::getInstance($model, 'pdf');
                if (!is_null($pdf)) {
                    $model->file_src_filename = $pdf->name;
                    $ext = explode(".", $pdf->name);                    
                    $model->file_web_filename = str_replace(" ", "", Yii::$app->security->generateRandomString().$pdf->name);

                    Yii::$app->params['uploadPath'] = Yii::$app->basePath . '/web/uploads/pdf/';
                    $path = Yii::$app->params['uploadPath'].$model->file_web_filename;
                    $pdf->saveAs($path);
                }

                if ($model->save()) {             
                    return [
                        'forceReload'=>'#crud-datatable-pjax',
                        'title'=> "R3nstr4 #".$id,
                        'content'=>$this->renderAjax('view', [
                            'model' => $model,
                        ]),
                        'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                                Html::a('Edit',['update','id'=>$id],['class'=>'btn btn-primary','role'=>'modal-remote'])
                    ];
                }  else {
                    var_dump ($model->getErrors()); die();
                }                    
            }else{
                 return [
                    'title'=> "Update R3nstr4 #".$id,
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
                return $this->redirect(['view', 'id' => $model->id_renstra]);
            } else {
                return $this->render('update', [
                    'model' => $model,
                ]);
            }
        }
    }

    /**
     * Delete an existing R3nstr4 model.
     * For ajax request will return json object
     * and for non-ajax request if deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = R3nstr4::find()->where(['id_renstra' => $id])->one();
        $request = Yii::$app->request;
        if ($this->findModel($id)->delete()){
            @unlink(Yii::$app->basePath . '/web/uploads/cover/'.$model->cover_web_filename);
            @unlink(Yii::$app->basePath . '/web/uploads/pdf/'.$model->file_web_filename);
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
     * Delete multiple existing R3nstr4 model.
     * For ajax request will return json object
     * and for non-ajax request if deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
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
     * Finds the R3nstr4 model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return R3nstr4 the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = R3nstr4::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    
}
