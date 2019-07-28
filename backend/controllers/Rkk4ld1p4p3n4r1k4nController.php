<?php

namespace backend\controllers;

use Yii;
use backend\models\Rkk4ld1p4p3n4r1k4n;
use backend\models\Rkk4ld1p4p3n4r1k4nSearch;

use backend\models\Rkk4ld1p4r34l1s4s1;
use backend\models\Rkk4ld1p4r34l1s4s1Search;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use \yii\web\Response;
use yii\helpers\Html;
use yii\filters\AccessControl;
use yii\helpers\Json;

/**
 * Rkk4ld1p4p3n4r1k4nController implements the CRUD actions for Rkk4ld1p4p3n4r1k4n model.
 */
class Rkk4ld1p4p3n4r1k4nController extends Controller
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
     * Lists all Rkk4ld1p4p3n4r1k4n models.
     * @return mixed
     */
    public function actionIndex()
    {    
        $searchModel = new Rkk4ld1p4p3n4r1k4nSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        //$dataProvider->query->andWhere(['kd_subdir'=>$kd_subdir,'thn_anggaran'=>$thn,'revisi'=>$revisi]); 
        $dataProvider->query->andWhere(['kd_subdir'=>'DKA','thn_anggaran'=>'2017','revisi'=>'0']); 
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionUpdateNilaiPenarikan()
{
       $model = new Rkk4ld1p4p3n4r1k4nSearch();
       return $this->renderAjax('_update_nominal', [
                'model' => $model,
        ]);

}

    public function actionProses($kd_subdir,$thn_anggaran,$revisi)
    {    
        $searchModel = new Rkk4ld1p4p3n4r1k4nSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->andWhere(['kd_subdir'=>$kd_subdir,'thn_anggaran'=>$thn_anggaran,'revisi'=>$revisi]);         
        $params=array();
        $params['kd_subdir']=$kd_subdir;
        $params['thn_anggaran']=$thn_anggaran;
        $params['revisi']=$revisi;

        // --------------- //
        if (Yii::$app->request->post('hasEditable')) {
            $id = Yii::$app->request->post('editableKey');            
            $prm = json_decode( $id, true);
            $model = Rkk4ld1p4p3n4r1k4n::findOne(['id_rkkal' => $prm['id_rkkal'], 'kd_subdir' => $prm['kd_subdir'], 'thn_anggaran' => $prm['thn_anggaran']]);                        

            $out = Json::encode(['output'=>'', 'message'=>'']);
            $post = [];
            $posted = current($_POST['Rkk4ld1p4p3n4r1k4n']);
            $post['Rkk4ld1p4p3n4r1k4n'] = $posted;

            if ($model->load($post)) {                
                $model->save();                
            }             
            echo $out;
            return;
        }           

        // --------------- //
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'nparams' => $params
        ]);
    }

    public function actionProsesRealisasi($kd_subdir,$thn_anggaran,$revisi)
    {    
        $searchModel = new Rkk4ld1p4r34l1s4s1Search();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->andWhere(['kd_subdir'=>$kd_subdir,'thn_anggaran'=>$thn_anggaran,'revisi'=>$revisi]);         
        $params=array();
        $params['kd_subdir']=$kd_subdir;
        $params['thn_anggaran']=$thn_anggaran;
        $params['revisi']=$revisi;

        // --------------- //
        if (Yii::$app->request->post('hasEditable')) {
            $id = Yii::$app->request->post('editableKey');            
            $prm = json_decode( $id, true);
            $model = Rkk4ld1p4r34l1s4s1::findOne(['id_rkkal' => $prm['id_rkkal'], 'kd_subdir' => $prm['kd_subdir'], 'thn_anggaran' => $prm['thn_anggaran']]);                        

            $out = Json::encode(['output'=>'', 'message'=>'']);
            $post = [];
            $posted = current($_POST['Rkk4ld1p4r34l1s4s1']);
            $post['Rkk4ld1p4r34l1s4s1'] = $posted;

            if ($model->load($post)) {                
                $model->save();                
            }             
            echo $out;
            return;
        }
        // --------------- //
        
        return $this->render('index_real', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'nparams' => $params
        ]);
    }

    public function actionIndexAwal()
    {    
        $model = new Rkk4ld1p4p3n4r1k4nSearch();        
        $data = $model->_dataProsesRkkal();        
        return $this->render('index_awal',['model' => $data]);                    
    }

    public function actionIndexRealisasi()
    {    
        $model = new Rkk4ld1p4p3n4r1k4nSearch();        
        $data = $model->_dataProsesRkkal();        
        return $this->render('index_realisasi',['model' => $data]);                    
    }


    /**
     * Displays a single Rkk4ld1p4p3n4r1k4n model.
     * @param integer $id_rkkal
     * @param string $kd_subdir
     * @param string $thn_anggaran
     * @return mixed
     */
    public function actionView($id_rkkal, $kd_subdir, $thn_anggaran)
    {   
        $request = Yii::$app->request;
        if($request->isAjax){
            Yii::$app->response->format = Response::FORMAT_JSON;
            return [
                    'title'=> "Rkk4ld1p4p3n4r1k4n #".$id_rkkal, $kd_subdir, $thn_anggaran,
                    'content'=>$this->renderAjax('view', [
                        'model' => $this->findModel($id_rkkal, $kd_subdir, $thn_anggaran),
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                            Html::a('Edit',['update','id_rkkal, $kd_subdir, $thn_anggaran'=>$id_rkkal, $kd_subdir, $thn_anggaran],['class'=>'btn btn-primary','role'=>'modal-remote'])
                ];    
        }else{
            return $this->render('view', [
                'model' => $this->findModel($id_rkkal, $kd_subdir, $thn_anggaran),
            ]);
        }
    }

    /**
     * Creates a new Rkk4ld1p4p3n4r1k4n model.
     * For ajax request will return json object
     * and for non-ajax request if creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $request = Yii::$app->request;
        $model = new Rkk4ld1p4p3n4r1k4n();  

        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if($request->isGet){
                return [
                    'title'=> "Create new Rkk4ld1p4p3n4r1k4n",
                    'content'=>$this->renderAjax('create', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                                Html::button('Save',['class'=>'btn btn-primary','type'=>"submit"])
        
                ];         
            }else if($model->load($request->post()) && $model->save()){
                return [
                    'forceReload'=>'#crud-datatable-pjax',
                    'title'=> "Create new Rkk4ld1p4p3n4r1k4n",
                    'content'=>'<span class="text-success">Create Rkk4ld1p4p3n4r1k4n success</span>',
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                            Html::a('Create More',['create'],['class'=>'btn btn-primary','role'=>'modal-remote'])
        
                ];         
            }else{           
                return [
                    'title'=> "Create new Rkk4ld1p4p3n4r1k4n",
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
                return $this->redirect(['view', 'id_rkkal' => $model->id_rkkal, 'kd_subdir' => $model->kd_subdir, 'thn_anggaran' => $model->thn_anggaran]);
            } else {
                return $this->render('create', [
                    'model' => $model,
                ]);
            }
        }
       
    }

    /**
     * Updates an existing Rkk4ld1p4p3n4r1k4n model.
     * For ajax request will return json object
     * and for non-ajax request if update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id_rkkal
     * @param string $kd_subdir
     * @param string $thn_anggaran
     * @return mixed
     */
    public function actionUpdate($id_rkkal, $kd_subdir, $thn_anggaran)
    {
        $request = Yii::$app->request;
        $model = $this->findModel($id_rkkal, $kd_subdir, $thn_anggaran);       

        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if($request->isGet){
                return [
                    'title'=> "Update Rkk4ld1p4p3n4r1k4n #".$id_rkkal, $kd_subdir, $thn_anggaran,
                    'content'=>$this->renderAjax('update', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                                Html::button('Save',['class'=>'btn btn-primary','type'=>"submit"])
                ];         
            }else if($model->load($request->post()) && $model->save()){
                return [
                    'forceReload'=>'#crud-datatable-pjax',
                    'title'=> "Rkk4ld1p4p3n4r1k4n #".$id_rkkal, $kd_subdir, $thn_anggaran,
                    'content'=>$this->renderAjax('view', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                            Html::a('Edit',['update','id_rkkal, $kd_subdir, $thn_anggaran'=>$id_rkkal, $kd_subdir, $thn_anggaran],['class'=>'btn btn-primary','role'=>'modal-remote'])
                ];    
            }else{
                 return [
                    'title'=> "Update Rkk4ld1p4p3n4r1k4n #".$id_rkkal, $kd_subdir, $thn_anggaran,
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
                return $this->redirect(['view', 'id_rkkal' => $model->id_rkkal, 'kd_subdir' => $model->kd_subdir, 'thn_anggaran' => $model->thn_anggaran]);
            } else {
                return $this->render('update', [
                    'model' => $model,
                ]);
            }
        }
    }

    /**
     * Delete an existing Rkk4ld1p4p3n4r1k4n model.
     * For ajax request will return json object
     * and for non-ajax request if deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id_rkkal
     * @param string $kd_subdir
     * @param string $thn_anggaran
     * @return mixed
     */
    public function actionDelete($id_rkkal, $kd_subdir, $thn_anggaran)
    {
        $request = Yii::$app->request;
        $this->findModel($id_rkkal, $kd_subdir, $thn_anggaran)->delete();

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
     * Delete multiple existing Rkk4ld1p4p3n4r1k4n model.
     * For ajax request will return json object
     * and for non-ajax request if deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id_rkkal
     * @param string $kd_subdir
     * @param string $thn_anggaran
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
     * Finds the Rkk4ld1p4p3n4r1k4n model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id_rkkal
     * @param string $kd_subdir
     * @param string $thn_anggaran
     * @return Rkk4ld1p4p3n4r1k4n the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_rkkal, $kd_subdir, $thn_anggaran)
    {
        if (($model = Rkk4ld1p4p3n4r1k4n::findOne(['id_rkkal' => $id_rkkal, 'kd_subdir' => $kd_subdir, 'thn_anggaran' => $thn_anggaran])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
