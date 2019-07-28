<?php
use yii\helpers\Url;
use yii\helpers\Html;
//use yii\grid\GridView; 
use kartik\grid\GridView;
use backend\models\Rkk4ld1p4p3n4r1k4n;
use backend\models\Rkk4ld1p4r34l1s4s13ntr1;
use backend\models\Rkk4ld1p4r34l1s4s13ntr1Search;

return [
    
    [
        'attribute'=>'id_rkkal',
        'pageSummary'=>'Total :',
        'pageSummaryOptions'=>['class'=>'text-right text-warning'],
    ],
    // [
    //     'class' => 'kartik\grid\CheckboxColumn',
    //     'width' => '20px',
    // ],
    [                
        'class' => 'kartik\grid\ExpandRowColumn',
        'width' => '50px',
        'value' => function ($model, $key, $index, $column) {
            return GridView::ROW_COLLAPSED;
        },        
        'detail' => function ($model, $key, $index, $column) {   
            if(Yii::$app->controller->action->id == 'proses-realisasi'){
                $searchModel = new Rkk4ld1p4r34l1s4s13ntr1Search();
                $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
                $dataProvider->query->andWhere(['id_rkkal' => $model->id_rkkal, 
                                                'kd_subdir' => $model->kd_subdir,                                                         
                                                'thn_anggaran' => $model->kd_subdir.$model->thn_anggaran]);         
                if($dataProvider->getCount()>0){                
                    return Yii::$app->controller->renderPartial('_row_details', 
                            [
                                'searchModel' => $searchModel,
                                'dataProvider' => $dataProvider,
                            ]
                        );
                }else{
                    return '';
                }  
            }else{
                return '';
            }        
                      
        },
        'headerOptions' => ['class' => 'kartik-sheet-style'],
        'expandOneOnly' => true,
    ],
    // [
    //     'class'=>'\kartik\grid\DataColumn',
    //     'attribute'=>'id_rkkal',
    //     'width' => '20px',
    //     'label'=>'Id rkkal',
    //     'vAlign'=>'middle',
    // ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'kd_apbn',  
        'label'=>'Kode apbn',
        'vAlign'=>'middle',        
    ],    
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'uraian_kegiatan',
        'vAlign'=>'middle',
        'format'=>'html',   
        'contentOptions' => [
            'style'=>'max-width:1000px; overflow: auto; white-space: normal; word-wrap: break-word;'
        ],
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'anggaran',
        'format'=>['decimal',0],
        'vAlign'=>'middle',    
        'hAlign'=>'right',        
        'pageSummary'=>true,
        'pageSummaryFunc'=>GridView::F_SUM    
    ],
    
    [
        'class'=>'\kartik\grid\EditableColumn',
        'attribute'=>'n01',        
        'label'=>'Jan', 
        'format'=>['decimal',0],  
        'vAlign'=>'middle',   
        'hAlign'=>'right',        
        'pageSummary'=>true,
        'pageSummaryFunc'=>GridView::F_SUM   
    ],
    [
        'class'=>'\kartik\grid\EditableColumn',
        'attribute'=>'n02',        
        'label'=>'Feb', 
        'format'=>['decimal',0],  
        'vAlign'=>'middle',  
        'hAlign'=>'right',        
        'pageSummary'=>true,
        'pageSummaryFunc'=>GridView::F_SUM      
    ],
    [
        'class'=>'\kartik\grid\EditableColumn',
        'attribute'=>'n03',        
        'label'=>'Mar', 
        'format'=>['decimal',0],  
        'vAlign'=>'middle',      
        'hAlign'=>'right',        
        'pageSummary'=>true,
        'pageSummaryFunc'=>GridView::F_SUM  
    ],
    [
        'class'=>'\kartik\grid\EditableColumn',
        'attribute'=>'n04',        
        'label'=>'Apr', 
        'format'=>['decimal',0],  
        'vAlign'=>'middle',      
        'hAlign'=>'right',        
        'pageSummary'=>true,
        'pageSummaryFunc'=>GridView::F_SUM  
    ],
    [
        'class'=>'\kartik\grid\EditableColumn',
        'attribute'=>'n05',        
        'label'=>'Mei', 
        'format'=>['decimal',0],  
        'vAlign'=>'middle',      
        'hAlign'=>'right',        
        'pageSummary'=>true,
        'pageSummaryFunc'=>GridView::F_SUM  
    ],
    [
        'class'=>'\kartik\grid\EditableColumn',
        'attribute'=>'n06',        
        'label'=>'Jun', 
        'format'=>['decimal',0],  
        'vAlign'=>'middle',      
        'hAlign'=>'right',        
        'pageSummary'=>true,
        'pageSummaryFunc'=>GridView::F_SUM  
    ],
    [
        'class'=>'\kartik\grid\EditableColumn',
        'attribute'=>'n07',        
        'label'=>'Jul', 
        'format'=>['decimal',0],  
        'vAlign'=>'middle',     
        'hAlign'=>'right',        
        'pageSummary'=>true,
        'pageSummaryFunc'=>GridView::F_SUM   
    ],
    [
        'class'=>'\kartik\grid\EditableColumn',
        'attribute'=>'n08',        
        'label'=>'Agus', 
        'format'=>['decimal',0],  
        'vAlign'=>'middle',      
        'hAlign'=>'right',        
        'pageSummary'=>true,
        'pageSummaryFunc'=>GridView::F_SUM  
    ],
    [
        'class'=>'\kartik\grid\EditableColumn',
        'attribute'=>'n09',        
        'label'=>'Sept', 
        'format'=>['decimal',0],  
        'vAlign'=>'middle',      
        'hAlign'=>'right',        
        'pageSummary'=>true,
        'pageSummaryFunc'=>GridView::F_SUM  
    ],
    [
        'class'=>'\kartik\grid\EditableColumn',
        'attribute'=>'n10',        
        'label'=>'Okt', 
        'format'=>['decimal',0],  
        'vAlign'=>'middle',      
        'hAlign'=>'right',        
        'pageSummary'=>true,
        'pageSummaryFunc'=>GridView::F_SUM  
    ],
    [
        'class'=>'\kartik\grid\EditableColumn',
        'attribute'=>'n11',        
        'label'=>'Nov', 
        'format'=>['decimal',0],  
        'vAlign'=>'middle',      
        'hAlign'=>'right',        
        'pageSummary'=>true,
        'pageSummaryFunc'=>GridView::F_SUM  
    ],    
    [
        'class'=>'\kartik\grid\EditableColumn',
        'attribute'=>'n12',        
        'label'=>'Des',      
        'format'=>['decimal',0],
        'vAlign'=>'middle',        
        'hAlign'=>'middle',        
        'pageSummary'=>true,
        'pageSummaryFunc'=>GridView::F_SUM
    ],
    
   
    

    [
        'class' => '\kartik\grid\ActionColumn',
        'template' => '',
        'vAlign'=>'middle',
        'buttons'  => [
        'update' => function($url, $model) {
                return Html::a('<span class="btn btn-block btn-primary">Proses</span>', $url, 
                        ['title' => Yii::t('app', 'Update'),'data-toggle'=>'modal','data-target'=>'#modalvote',]);
        }
        ],        
        'urlCreator' => function ($action, $model, $key, $index) {        
        if($action === 'update') {
                $url = Yii::$app->request->baseUrl.'/rkk4ld1p4p3n4r1k4n/update-nilai-penarikan?&id='.$model['id_rkkal'].'&kd_subdir='.$model['kd_subdir'].'&thn_anggaran='.$model['thn_anggaran'].'&revisi='.$model['revisi'];
                return $url;
        }
        }
    ]                  
];   

