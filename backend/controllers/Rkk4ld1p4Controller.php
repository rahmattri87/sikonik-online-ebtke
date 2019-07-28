<?php
 
namespace backend\controllers;
 
use Yii;
use backend\models\Rkk4ld1p4;
use backend\models\Rkk4ld1p4Search;

use backend\models\Rkk4ld1p4_tmp;
use backend\models\Rkk4ld1p4Search_tmp;

use backend\models\Rkk4ld1p4_h1st0ry;
use backend\models\Rkk4ld1p4Search_h1st0ry;

use backend\models\D1r3kt0r4t;
use backend\models\D1r3kt0r4tSearch;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use PHPExcel_IOFactory;
use PHPExcel_Cell;
use yii\helpers\Html;
use app\models\UploadForm;
use yii\web\UploadedFile;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;




/**
 * manual CRUD
 **/
class Rkk4ld1p4Controller extends Controller
{      
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
     * Create
     */
    public function actionCreate()
    {
        $model = new Rkk4ld1p4();
 
        // new record
        if($model->load(Yii::$app->request->post()) && $model->save()){
            return $this->redirect(['index']);
        }
                 
        return $this->render('create', ['model' => $model]);
    }
     
    /**
     * Read
     */
    public function actionIndex()
    {       
        if (Yii::$app->request->isAjax) {
                 
            $cbSbDirektorat2 = Yii::$app->request->post('cbSbDirektorat2');        
            $thn2 = Yii::$app->request->post('thn2');   
            $cbRevisi2 = Yii::$app->request->post('cbRevisi2');        

            $searchModel = new Rkk4ld1p4Search_tmp();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
            //$dataProvider->query->andWhere(['id_rkkal'=>'1']);
            $searchModel2 = new Rkk4ld1p4Search();
            $dataProvider2 = $searchModel2->search(Yii::$app->request->queryParams);        
            $searchModel3 = new Rkk4ld1p4Search_h1st0ry();
            $dataProvider3 = $searchModel3->search(Yii::$app->request->queryParams);   
            $dataProvider3->query->andWhere(['kd_subdir'=>$cbSbDirektorat2,'thn_anggaran'=>$thn2,'revisi'=>$cbRevisi2]); 

            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
                'dataProvider2' => $dataProvider2,
                'dataProvider3' => $dataProvider3,
                'string' => $cbSbDirektorat2.','.$thn2.','.$cbRevisi2,
            ]);
        }else{
            $searchModel = new Rkk4ld1p4Search_tmp();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
            //$dataProvider->query->andWhere(['id_rkkal'=>'1']);
            $searchModel2 = new Rkk4ld1p4Search();
            $dataProvider2 = $searchModel2->search(Yii::$app->request->queryParams);        
            $searchModel3 = new Rkk4ld1p4Search_h1st0ry();
            $dataProvider3 = $searchModel3->search(Yii::$app->request->queryParams);      
            $dataProvider3->query->andWhere(['kd_subdir'=>'','thn_anggaran'=>'','revisi'=>'']);          
            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
                'dataProvider2' => $dataProvider2,
                'dataProvider3' => $dataProvider3,
                'string' => ' , , ',
            ]);
        }

        
    }

    public function actionFormSubmission()
    {       
        if (Yii::$app->request->isAjax) {
                 
            $cbSbDirektorat2 = Yii::$app->request->post('cbSbDirektorat2');        
            $thn2 = Yii::$app->request->post('thn2');   
            $cbRevisi2 = Yii::$app->request->post('cbRevisi2');        

            $searchModel = new Rkk4ld1p4Search_tmp();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
            //$dataProvider->query->andWhere(['id_rkkal'=>'1']);
            $searchModel2 = new Rkk4ld1p4Search();
            $dataProvider2 = $searchModel2->search(Yii::$app->request->queryParams);        
            $searchModel3 = new Rkk4ld1p4Search_h1st0ry();
            $dataProvider3 = $searchModel3->search(Yii::$app->request->queryParams);   
            $dataProvider3->query->andWhere(['kd_subdir'=>$cbSbDirektorat2,'thn_anggaran'=>$thn2,'revisi'=>$cbRevisi2]); 

            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
                'dataProvider2' => $dataProvider2,
                'dataProvider3' => $dataProvider3,
                'stringHash' => $cbSbDirektorat2.' | '.$thn2.' | '.$cbRevisi2,
            ]);
        } 
        
        

        
    }

    public function actionIndexRevisi($cbSbDirektorat2,$thn2,$cbRevisi2)
    {            
        // if (Yii::$app->request->isAjax) {
        //     $data = Yii::$app->request->post();
        //     $cbSbDirektorat= explode(",", $data['cbSbDirektorat2']);
        //     $cbSbDirektorat= $cbSbDirektorat[0]; 

        //     $thn= explode(",", $data['thn2']);
        //     $thn= $thn[0];         
            
        //     $cbRevisi= explode(",", $data['cbRevisi2']);
        //     $cbRevisi= $cbRevisi[0];
                       
        //     $searchModel = new Rkk4ld1p4Search_tmp();
        //     $dataProvider = $searchModel->search(Yii::$app->request->queryParams);            
        //     $searchModel2 = new Rkk4ld1p4Search();
        //     $dataProvider2 = $searchModel2->search(Yii::$app->request->queryParams);        
        //     $searchModel3 = new Rkk4ld1p4Search_h1st0ry();            
        //     $dataProvider3 = $searchModel3->search(Yii::$app->request->queryParams);        
        //     $dataProvider3->query->andWhere(['id_rkkal'=>'1','kd_subdir'=>'DKP','thn_anggaran'=>'2017']); 
        //     return $this->render('index', [
        //         'searchModel' => $searchModel,
        //         'dataProvider' => $dataProvider,
        //         'dataProvider2' => $dataProvider2,
        //         'dataProvider3' => $dataProvider3,
        //     ]);
        // } 
            
            $searchModel = new Rkk4ld1p4Search_tmp();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);            
            $searchModel2 = new Rkk4ld1p4Search();
            $dataProvider2 = $searchModel2->search(Yii::$app->request->queryParams);        
            $searchModel3 = new Rkk4ld1p4Search_h1st0ry();            
            $dataProvider3 = $searchModel3->search(Yii::$app->request->queryParams);        
            //$dataProvider3->query->andWhere(['kd_subdir'=>$cbSbDirektorat2,'thn_anggaran'=>$thn2,'revisi'=>$cbRevisi2]); 
            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
                'dataProvider2' => $dataProvider2,
                'dataProvider3' => $dataProvider3,
            ]);

        
    }
     
    /**
     * Edit
     * @param integer $id
     */
    public function actionEdit($id_rkkal,$kd_subdir,$thn_anggaran)
    {
        $model = Rkk4ld1p4::find()->where(['id_rkkal' => $id_rkkal,'kd_subdir' => $kd_subdir,'thn_anggaran' => $thn_anggaran])->one();
 
        // $id not found in database
        if($model === null)
            throw new NotFoundHttpException('The requested page does not exist.');
         
        // update record
        if($model->load(Yii::$app->request->post()) && $model->save()){
            return $this->redirect(['index']);
        }
         
        return $this->render('edit', ['model' => $model]);
    }
     
    /**
     * Delete
     * @param integer $id
     */
     public function actionDelete($id_rkkal,$kd_subdir,$thn_anggaran)
     {
         $model = Student::findOne($id_rkkal,$kd_subdir,$thn_anggaran);
         
        // $id not found in database
        if($model === null)
            throw new NotFoundHttpException('The requested page does not exist.');
             
        // delete record
        $model->delete();
         
        return $this->redirect(['index']);
     }     

     public function actionImportExcel()
     {    
        if (Yii::$app->request->isAjax) {
            $data = Yii::$app->request->post();
            $thn= explode(",", $data['thn']);
            $thn= $thn[0];   

            $cbRevisi= explode(",", $data['cbRevisi']);
            $cbRevisi= $cbRevisi[0];              

            //$inputFile = 'C:/Users/Rahmat Tri/Desktop/db umj/Contoh Upload Excel.xlsx';
            $inputFile = \yii\web\UploadedFile::getInstanceByName('fileInput')->tempName;         
            $inputFileType = \PHPExcel_IOFactory::identify($inputFile);
            $objReader = \PHPExcel_IOFactory::createReader($inputFileType);
            $objPHPExcel = $objReader->load($inputFile);

            $sheet = $objPHPExcel->getSheet(0);
            $highestRow = $sheet->getHighestRow();
            $highestColumn = $sheet->getHighestColumn();
            
            for($row = 1; $row <= $highestRow; $row++){
                $rowData = $sheet->rangeToArray('A'.$row.':'.$highestColumn.$row,null,true,false);
                if($row==1){
                    continue;
                }   

                $rkk = new Rkk4ld1p4_tmp();
                $rkk->id_rkkal = $rowData[0][0];
                $rkk->kd_apbn = (string)$rowData[0][1];
                $rkk->kd_subdir = (string)$rowData[0][2];
                $rkk->thn_anggaran = (string)$rowData[0][3];
                if($rowData[0][4]==""){
                    $rkk->uraian_kegiatan = "-";
                }else{
                    $rkk->uraian_kegiatan = (string)$rowData[0][4];
                }                
                $rkk->volume = 0;
                $rkk->satuan = "";
                $rkk->harga_satuan = 0;
                $rkk->jumlah = 0;
                if ($rowData[0][5]==""){
                    $rkk->anggaran = 0;
                }else{
                    $rkk->anggaran = $rowData[0][5];
                }
                
                $rkk->file_rkkal = "-";
                $rkk->id_user = Yii::$app->user->identity->username;
                $rkk->wkt_input = date('Y-m-d H:i:s');
                $rkk->ip_input = Yii::$app->getRequest()->getUserIP();
                $rkk->revisi = $cbRevisi;
                $rkk->save();   
                //print_r($rkk->getErrors());                         
            } 
            
            
        }    
    }

    public function actionTransferExcel(){
        $Model = new Rkk4ld1p4Search_tmp();
        $Model->_transferExcel();
    }

    public function actionTransferExcelRevisi(){
        $Model = new Rkk4ld1p4Search_tmp();
        $Model->_transferExcelRevisi();
    }

    public function actionTruncateExcel(){
        $Model = new Rkk4ld1p4Search_tmp();
        $Model->_transferExcel();
    }
}

