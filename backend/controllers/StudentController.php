<?php
 
namespace backend\controllers;
 
use Yii;
use backend\models\Student;
use backend\models\Rkk4ld1p4;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use PHPExcel_IOFactory;
use PHPExcel_Cell;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
/**
 * manual CRUD
 **/
class StudentController extends Controller
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
        $model = new Student();
 
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
        $student = Student::find()->all();
         
        return $this->render('index', ['model' => $student]);
    }
     
    /**
     * Edit
     * @param integer $id
     */
    public function actionEdit($id,$add)
    {
        $model = Student::find()->where(['id' => $id,'address' => $add])->one();
 
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
     public function actionDelete($id,$add)
     {
         $model = Student::findOne($id,$add);
         
        // $id not found in database
        if($model === null)
            throw new NotFoundHttpException('The requested page does not exist.');
             
        // delete record
        $model->delete();
         
        return $this->redirect(['index']);
     } 

     public function actionImportExcel(){
         $inputFile = 'C:/Users/Rahmat Tri/Desktop/db umj/Contoh Upload Excel.xlsx';

        //  $tmpfname = $inputFile;
        //  $excelReader = PHPExcel_IOFactory::createReaderForFile($tmpfname);
        //  $excelObj = $excelReader->load($tmpfname);
        //  $worksheet = $excelObj->getSheet(0);
        //  $lastRow = $worksheet->getHighestRow();
 
        //  echo "<table border='1'>";
        //  for ($row = 2; $row <= $lastRow; $row++) {
        //       echo "<tr><td>";
        //       echo $worksheet->getCell('A'.$row)->getValue();
        //       echo "</td><td>";
        //       echo $worksheet->getCell('B'.$row)->getValue();
        //       echo "</td><td>";
        //       echo $worksheet->getCell('C'.$row)->getValue();
        //       echo "</td><td>";
        //       echo $worksheet->getCell('D'.$row)->getValue();
        //       echo "</td><td>";
        //       echo $worksheet->getCell('E'.$row)->getValue();
        //       echo "</td><td>";
        //       echo $worksheet->getCell('F'.$row)->getValue();
        //       echo "</td><tr>";

        //         $rkk = new Rkk4ld1p4();
        //         $rkk->id_rkkal = $worksheet->getCell('A'.$row)->getValue();
        //         $rkk->kd_apbn = $worksheet->getCell('B'.$row)->getValue();
        //         $rkk->kd_subdir = $worksheet->getCell('C'.$row)->getValue();
        //         $rkk->thn_anggaran = $worksheet->getCell('D'.$row)->getValue();
        //         $rkk->uraian_kegiatan = $worksheet->getCell('E'.$row)->getValue();
        //         $rkk->volume = "";
        //         $rkk->satuan = "";
        //         $rkk->harga_satuan = "";
        //         $rkk->jumlah = "";
        //         $rkk->anggaran = $worksheet->getCell('F'.$row)->getValue();
        //         $rkk->file_rkkal = "";
        //         $rkk->id_user = "admin";
        //         $rkk->wkt_input = date('Y-m-d H:i:s');
        //         $rkk->ip_input = "";
        //         $rkk->save();
        //  }
        //  echo "</table>"; 

        try{
            $inputFileType = \PHPExcel_IOFactory::identify($inputFile);
            $objReader = \PHPExcel_IOFactory::createReader($inputFileType);
            $objPHPExcel = $objReader->load($inputFile);

            $sheet = $objPHPExcel->getSheet(0);
            $highestRow = $sheet->getHighestRow();
            $highestColumn = $sheet->getHighestColumn();

            echo "<table border='1'>";
            for($row = 1; $row <= $highestRow; $row++){
                $rowData = $sheet->rangeToArray('A'.$row.':'.$highestColumn.$row,null,true,false);
                if($row==1){
                    continue;
                }                             
                echo "<tr><td>";
                echo $rowData[0][0];
                echo "</td><td>";
                echo $rowData[0][1];
                echo "</td><td>";
                echo $rowData[0][2];
                echo "</td><td>";
                echo $rowData[0][3];
                echo "</td><td>";
                echo $rowData[0][4];
                echo "</td><td>";
                echo $rowData[0][5];
                echo "</td><tr>";
                
                 
                $rkk = new Rkk4ld1p4();
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
                $rkk->save();                
                print_r($rkk->getErrors());

            }
            echo "</table>"; 
        }catch(Exception $e){
            die('error: '.$e);
        }
        
        // $objPHPExcel = PHPExcel_IOFactory::load('C:/Users/Rahmat Tri/Desktop/db umj/Contoh Upload Excel.xlsx');
        // $dataArr = array();
        // foreach ($objPHPExcel->getWorksheetIterator() as $worksheet) {
        //     $worksheetTitle = $worksheet->getTitle();
        //     $highestRow = $worksheet->getHighestRow(); // e.g. 10
        //     $highestColumn = $worksheet->getHighestColumn(); // e.g 'F'
        //     $highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);
        
        //     for ($row = 1; $row <= $highestRow; ++$row) {
        //         for ($col = 0; $col < $highestColumnIndex; ++$col) {
        //             $cell = $worksheet->getCellByColumnAndRow($col, $row);
        //             $val = $cell->getValue();
        //             $dataArr[$row][$col] = $val;
        //         }
        //     }
        // }
        // unset($dataArr[1]); // since in our example the first row is the header and not the actual data
        
        // print '<pre>';
        // print_r($dataArr);

        die('stop');

     }
}