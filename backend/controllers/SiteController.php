<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use yii\db\Query;
use backend\models\D1r3kt0r4t;
use backend\models\Subd1r3kt0r4t; 
use backend\models\Ind1k4t0r; 


use yii\data\Pagination;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        //bisa tampil hello & dashboard
        // return [
        //     'access' => [
        //         'class' => AccessControl::className(),
        //         'only' => ['logout'],
        //         'rules' => [
        //             [
        //                 'actions' => ['logout','login', 'error'],
        //                 'allow' => true,
        //                 'roles' => ['@'],
        //             ],
        //         ],
        //     ],
        //     'verbs' => [
        //         'class' => VerbFilter::className(),
        //         'actions' => [
        //             'logout' => ['post'],
        //         ],
        //     ],
        // ];

        //login sesuai
        
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
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $db = \Yii::$app->db;                        
		$_xseries_data = array();
		$data_series =array();
        $_data = array ();        
        $_data_rnc = array ();
        $_data_real = array ();        

        $_data2 = array ();
        $_data_rnc2 = array ();
        $_data_real2 = array ();        
        
        $_data3 = array ();
        $_data31 = array ();
        $_xaxis_data3 = array ();

        $_data4 = array ();
        $_data41 = array ();
        $_xaxis_data4 = array ();

        if (Yii::$app->request->isAjax) {
            
            $thn2 = Yii::$app->request->post('thn2');  
            $cbDirektorat2 = Yii::$app->request->post('cbDirektorat2');            

            $thn3 = Yii::$app->request->post('thn3');                           
            $cbDirektorat3 = Yii::$app->request->post('cbDirektorat3');              
            $cbSbDirektorat3 = Yii::$app->request->post('cbSbDirektorat3');  

            $thn4 = Yii::$app->request->post('thn4');                           
            $cbDirektorat4 = Yii::$app->request->post('cbDirektorat4');              
            $cbSbDirektorat4 = Yii::$app->request->post('cbSbDirektorat4');  

            if (Yii::$app->request->post('cbIdIndikator')==''){                
                $cbIdIndikator = 'DKA17001';
            }else{
                $cbIdIndikator = Yii::$app->request->post('cbIdIndikator'); 
            }            
            
            $nmIdIndikator = Ind1k4t0r::findOne($cbIdIndikator)->isi_indikator;

            $thn5 = Yii::$app->request->post('thn5');  
            
            
            if (Yii::$app->request->post('cbDirektorat5')==''){                
                $cbDirektorat5 = 'DIR01';
            }else{
                $cbDirektorat5 = Yii::$app->request->post('cbDirektorat5');   
            }                         
                                
            $nmDirektorat5 = D1r3kt0r4t::findOne($cbDirektorat5)->nm_direktorat;

            $string = $thn2.','.$cbDirektorat2.','.$thn3.','.$cbDirektorat3.','.$cbSbDirektorat3.','
                        .$thn4.','.$cbDirektorat4.','.$cbSbDirektorat4.','.$cbIdIndikator.','.ucwords(strtolower($nmIdIndikator)).','
                        .$thn5.','.$cbDirektorat5.','.$nmDirektorat5;   
        }else{            
            $thn2 = '2017';
            $cbDirektorat2 = 'DIR01';

            $thn3 = '2017';            
            $cbDirektorat3 = 'DIR01';
            $cbSbDirektorat3 = 'DKA';

            $thn4 = '2017';            
            $cbDirektorat4 = 'DIR01';
            $cbSbDirektorat4 = 'DKA';

            $cbIdIndikator = 'DKA17001';
            
            $nmIdIndikator = '-';

            $thn5 = '2017';  
            $cbDirektorat5 = 'DIR01'; 

            $nmDirektorat5 = '';

            $string = $thn2.','.$cbDirektorat2.','.$thn3.','.$cbDirektorat3.','.$cbSbDirektorat3.','
                        .$thn4.','.$cbDirektorat4.','.$cbSbDirektorat4.','.$cbIdIndikator.','.ucwords(strtolower($nmIdIndikator)).','
                        .$thn5.','.$cbDirektorat5.','.ucwords(strtolower($nmDirektorat5));   
        }
        
        /* ---------------------------------------------------------------------- */
        $rnc = $db->createCommand("
                SELECT
                        COALESCE(SUM(a.n01),0) AS n01, COALESCE(SUM(a.n02),0) AS n02, COALESCE(SUM(a.n03),0) AS n03, COALESCE(SUM(a.n04),0) AS n04,
                        COALESCE(SUM(a.n05),0) AS n05, COALESCE(SUM(a.n06),0) AS n06, COALESCE(SUM(a.n07),0) AS n07, COALESCE(SUM(a.n08),0) AS n08,
                        COALESCE(SUM(a.n09),0) AS n09, COALESCE(SUM(a.n10),0) AS n10, COALESCE(SUM(a.n11),0) AS n11, COALESCE(SUM(a.n12),0) AS n12
                FROM rkk4l_d1p4_p3n4r1k4n AS a JOIN subd1r3kt0r4t AS b ON a.kd_subdir=b.kd_subdir
                JOIN d1r3kt0r4t AS c ON b.kd_direktorat=c.kd_direktorat
                WHERE a.thn_anggaran='".$thn2."' AND c.kd_direktorat='".$cbDirektorat2."';                
                ")->queryAll();
        foreach ($rnc as $key => $r){
            array_push($_data_rnc,(int)$r['n01']) ; 
            array_push($_data_rnc,(int)$r['n02']) ; 
            array_push($_data_rnc,(int)$r['n03']) ; 
            array_push($_data_rnc,(int)$r['n04']) ; 
            array_push($_data_rnc,(int)$r['n05']) ; 
            array_push($_data_rnc,(int)$r['n06']) ;              
            array_push($_data_rnc,(int)$r['n07']) ; 
            array_push($_data_rnc,(int)$r['n08']) ; 
            array_push($_data_rnc,(int)$r['n09']) ; 
            array_push($_data_rnc,(int)$r['n10']) ; 
            array_push($_data_rnc,(int)$r['n11']) ; 
            array_push($_data_rnc,(int)$r['n12']) ; 
        }        

        $real = $db->createCommand("
                SELECT
                        COALESCE(SUM(a.n01),0) AS n01, COALESCE(SUM(a.n02),0) AS n02, COALESCE(SUM(a.n03),0) AS n03, COALESCE(SUM(a.n04),0) AS n04,
                        COALESCE(SUM(a.n05),0) AS n05, COALESCE(SUM(a.n06),0) AS n06, COALESCE(SUM(a.n07),0) AS n07, COALESCE(SUM(a.n08),0) AS n08,
                        COALESCE(SUM(a.n09),0) AS n09, COALESCE(SUM(a.n10),0) AS n10, COALESCE(SUM(a.n11),0) AS n11, COALESCE(SUM(a.n12),0) AS n12
                FROM rkk4l_d1p4_r34l1s4s1 AS a JOIN subd1r3kt0r4t AS b ON a.kd_subdir=b.kd_subdir
                JOIN d1r3kt0r4t AS c ON b.kd_direktorat=c.kd_direktorat
                WHERE a.thn_anggaran='".$thn2."' AND c.kd_direktorat='".$cbDirektorat2."';                
                ")->queryAll();
        foreach ($real as $key => $r){
            array_push($_data_real,(int)$r['n01']) ; 
            array_push($_data_real,(int)$r['n02']) ; 
            array_push($_data_real,(int)$r['n03']) ; 
            array_push($_data_real,(int)$r['n04']) ; 
            array_push($_data_real,(int)$r['n05']) ; 
            array_push($_data_real,(int)$r['n06']) ;              
            array_push($_data_real,(int)$r['n07']) ; 
            array_push($_data_real,(int)$r['n08']) ; 
            array_push($_data_real,(int)$r['n09']) ; 
            array_push($_data_real,(int)$r['n10']) ; 
            array_push($_data_real,(int)$r['n11']) ; 
            array_push($_data_real,(int)$r['n12']) ; 
        }

        array_push($_data,array('name'=>'Rencana Penarikan','data'=>$_data_rnc));
        array_push($_data,array('name'=>'Realisasi Anggaran','data'=>$_data_real));
        /* ---------------------------------------------------------------------- */

        /* ---------------------------------------------------------------------- */
        $rnc = $db->createCommand("
            SELECT
                    COALESCE(SUM(a.n01),0) AS n01, COALESCE(SUM(a.n02),0) AS n02, COALESCE(SUM(a.n03),0) AS n03, COALESCE(SUM(a.n04),0) AS n04,
                    COALESCE(SUM(a.n05),0) AS n05, COALESCE(SUM(a.n06),0) AS n06, COALESCE(SUM(a.n07),0) AS n07, COALESCE(SUM(a.n08),0) AS n08,
                    COALESCE(SUM(a.n09),0) AS n09, COALESCE(SUM(a.n10),0) AS n10, COALESCE(SUM(a.n11),0) AS n11, COALESCE(SUM(a.n12),0) AS n12
            FROM rkk4l_d1p4_p3n4r1k4n AS a JOIN subd1r3kt0r4t AS b ON a.kd_subdir=b.kd_subdir
            JOIN d1r3kt0r4t AS c ON b.kd_direktorat=c.kd_direktorat
            WHERE a.thn_anggaran='".$thn3."' AND c.kd_direktorat='".$cbDirektorat3."' AND b.kd_subdir='".$cbSbDirektorat3."';
                ")->queryAll();
        foreach ($rnc as $key => $r){
            array_push($_data_rnc2,(int)$r['n01']) ; 
            array_push($_data_rnc2,(int)$r['n02']) ; 
            array_push($_data_rnc2,(int)$r['n03']) ; 
            array_push($_data_rnc2,(int)$r['n04']) ; 
            array_push($_data_rnc2,(int)$r['n05']) ; 
            array_push($_data_rnc2,(int)$r['n06']) ;              
            array_push($_data_rnc2,(int)$r['n07']) ; 
            array_push($_data_rnc2,(int)$r['n08']) ; 
            array_push($_data_rnc2,(int)$r['n09']) ; 
            array_push($_data_rnc2,(int)$r['n10']) ; 
            array_push($_data_rnc2,(int)$r['n11']) ; 
            array_push($_data_rnc2,(int)$r['n12']) ; 
        }        

        $real = $db->createCommand("
            SELECT
                    COALESCE(SUM(a.n01),0) AS n01, COALESCE(SUM(a.n02),0) AS n02, COALESCE(SUM(a.n03),0) AS n03, COALESCE(SUM(a.n04),0) AS n04,
                    COALESCE(SUM(a.n05),0) AS n05, COALESCE(SUM(a.n06),0) AS n06, COALESCE(SUM(a.n07),0) AS n07, COALESCE(SUM(a.n08),0) AS n08,
                    COALESCE(SUM(a.n09),0) AS n09, COALESCE(SUM(a.n10),0) AS n10, COALESCE(SUM(a.n11),0) AS n11, COALESCE(SUM(a.n12),0) AS n12
            FROM rkk4l_d1p4_r34l1s4s1 AS a JOIN subd1r3kt0r4t AS b ON a.kd_subdir=b.kd_subdir
            JOIN d1r3kt0r4t AS c ON b.kd_direktorat=c.kd_direktorat
            WHERE a.thn_anggaran='".$thn3."' AND c.kd_direktorat='".$cbDirektorat3."' AND b.kd_subdir='".$cbSbDirektorat3."';
                ")->queryAll();
        foreach ($real as $key => $r){
            array_push($_data_real2,(int)$r['n01']) ; 
            array_push($_data_real2,(int)$r['n02']) ; 
            array_push($_data_real2,(int)$r['n03']) ; 
            array_push($_data_real2,(int)$r['n04']) ; 
            array_push($_data_real2,(int)$r['n05']) ; 
            array_push($_data_real2,(int)$r['n06']) ;              
            array_push($_data_real2,(int)$r['n07']) ; 
            array_push($_data_real2,(int)$r['n08']) ; 
            array_push($_data_real2,(int)$r['n09']) ; 
            array_push($_data_real2,(int)$r['n10']) ; 
            array_push($_data_real2,(int)$r['n11']) ; 
            array_push($_data_real2,(int)$r['n12']) ; 
        }

        array_push($_data2,array('name'=>'Rencana Penarikan','data'=>$_data_rnc2));
        array_push($_data2,array('name'=>'Realisasi Anggaran','data'=>$_data_real2));
        
        /* ---------------------------------------------------------------------- */
        

        array_push($_xaxis_data3,'Triwulan I') ; 
        array_push($_xaxis_data3,'Triwulan II') ; 
        array_push($_xaxis_data3,'Triwulan III') ; 
        array_push($_xaxis_data3,'Triwulan IV') ; 

        $_data_target = array ();
        $_data_capaian = array ();
        $_data_capaian_line = array ();
        $_data_prosentase = array ();

        $qry = $db->createCommand("
                SELECT a.id_sub_indikator, a.tri_wulan, b.target, a.capaian, FORMAT(a.capaian/b.target*100,2) AS prosentase
                FROM sub_ind1k4t0r_3ntr1 AS a JOIN sub_ind1k4t0r AS b ON a.id_sub_indikator=b.id_sub_indikator
                WHERE a.id_indikator='".$cbIdIndikator."';
                ")->queryAll();
        foreach ($qry as $key => $r){
            array_push($_data_target,(int)$r['target']) ; 
            array_push($_data_capaian,(int)$r['capaian']) ; 
            array_push($_data_capaian_line,(int)$r['capaian']/2) ; 
            array_push($_data_prosentase,(int)$r['prosentase']) ; 
        }

        array_push($_data3,array('type' => 'column','name'=>'Target','data'=>$_data_target));
        array_push($_data3,array('type' => 'column','name'=>'Capaian','data'=>$_data_capaian));
        array_push($_data3,array('type' => 'spline','name'=>'Prosentase (%)','data'=>$_data_capaian_line));

        array_push($_data31,array('name'=>'Prosentase Keberhasilan (%)','data'=>$_data_prosentase));

        /* ---------------------------------------------------------------------- */

        $qry = $db->createCommand("SELECT * FROM subd1r3kt0r4t;")->queryAll();
        foreach ($qry as $key => $r){
            array_push($_xaxis_data4,$r['kd_subdir']) ;
        }        
        

        $_data5 = array ();
        array_push($_data5,array('type' => 'column','name'=>'Triwulan I','data'=>[12,3,8,9,18]));        
        array_push($_data5,array('type' => 'column','name'=>'Triwulan II','data'=>[8,12,12,14,3])); 
        array_push($_data5,array('type' => 'column','name'=>'Triwulan III','data'=>[4,9,3,14,25]));
        array_push($_data5,array('type' => 'column','name'=>'Triwulan IV','data'=>[13,12,11,14,10]));
        

        array_push($_data5,array('type' => 'spline','name'=>'Capaian','data'=>[3, 2.67, 3, 6.33, 3.33]));
        
        $_dataPie = array ();
        array_push($_dataPie,array('name' => 'DKA','y'=>10));        
        array_push($_dataPie,array('name' => 'DKE','y'=>17));        
        array_push($_dataPie,array('name' => 'DKK','y'=>25));        
        array_push($_dataPie,array('name' => 'DKP','y'=>13));        
        array_push($_dataPie,array('name' => 'DKT','y'=>25));        

        array_push($_data5,
            array(
                'type' => 'pie', 
                'name' => 'Total',                               
                'data'=>$_dataPie,
                'center' => [215, 60],
                'size' => 90,
                'showInLegend' => false,
                'dataLabels' => ['enabled' => false,],
            )
        );

        /* ---------------------------------------------------------------------- */

        return $this->render('index',[
            'chart_x_axis' => $_xseries_data,
            'chart_x_series' => $_data,
            'chart_x_series2' => $_data2,

            'chart_x_axis3' => $_xaxis_data3,
            'chart_x_series3' => $_data3,
            'chart_x_series31' => $_data31,
            
            'chart_x_axis4' => $_xaxis_data4,            
            'chart_x_series41' => $_data41,

            'chart_x_series5' => $_data5,

            'string' => $string,
        ]);		
    }

    public function actionHello()
    {
        //exit();
        return $this->render('hello');
    }

    public function actionDashboard()
    {
        //And set flash messages anywhere
        Yii::$app->session->setFlash('info1','Message1');
        Yii::$app->session->setFlash('info2','Message2');
        Yii::$app->session->setFlash('info3','Message3');
        Yii::$app->session->setFlash('success-first','Message');
        Yii::$app->session->setFlash('success-second','Message');
        
        return $this->render('dashboard');
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        // if (!Yii::$app->user->isGuest) {
        //     return $this->goHome();
        // }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionDownload() {
        $path = Yii::getAlias('@webroot') . '/uploads';

        $file = $path . '/1.pdf';

        if (file_exists($file)) {
            Yii::$app->response->sendFile($file);
        }
    } 

    
}


