<?php
use yii\helpers\Url;
use kartik\grid\GridView;
return [   
    
    [
        'class' => 'kartik\grid\CheckboxColumn',
        'width' => '20px',
    ],
    [
        'class' => 'kartik\grid\SerialColumn',
        'width' => '30px',
    ],

    // [
    //     'class'=>'\kartik\grid\DataColumn',
    //     'attribute'=>'id_rkkal_entri',
    // ],    
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'kd_subdir',
        'vAlign'=>'middle',
        'group'=>true,  
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'value'=>'thnanggarannew',
        'label'=>'Tahun Anggaran',        
        'vAlign'=>'middle',
        'group'=>true,  
    ],   
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'id_rkkal',
        'vAlign'=>'middle',
        'group'=>true,  
    ], 
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'kegiatan',
        'vAlign'=>'middle',
        'format'=>'html',   
        'contentOptions' => [
            'style'=>'max-width:1000px; overflow: auto; white-space: normal; word-wrap: break-word;'
        ],
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'peserta',
        'vAlign'=>'middle',
        'format'=>'html',   
        'contentOptions' => [
            'style'=>'max-width:1000px; overflow: auto; white-space: normal; word-wrap: break-word;'
        ],
    ],
        
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'lokasi',
        'vAlign'=>'middle',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'tanggal',
        'vAlign'=>'middle',        
        'pageSummary'=>'Total :',
        'pageSummaryOptions'=>['class'=>'text-right text-warning'],
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'tri_wulan',
        'vAlign'=>'middle',
    ],
    
    [
        'class'=>'\kartik\grid\EditableColumn',
        'attribute'=>'biaya',        
        'label'=>'biaya', 
        'format'=>['decimal',0],  
        'vAlign'=>'middle',  
        'hAlign'=>'right',        
        'pageSummary'=>true,
        'pageSummaryFunc'=>GridView::F_SUM      
    ],              
    [
        'class' => 'kartik\grid\ActionColumn',
        'dropdown' => false,
        'vAlign'=>'middle',
        'urlCreator' => function($action, $model, $key, $index) { 
                //return Url::to([$action,'id_rkkal_entri, $id_rkkal, $kd_subdir, $thn_anggaran'=>$key]);
                return Url::to([$action,'id_rkkal_entri'=>$model->id_rkkal_entri,
                                        'id_rkkal'=>$model->id_rkkal,
                                        'kd_subdir'=>$model->kd_subdir,
                                        'thn_anggaran'=>$model->thn_anggaran]);
        },
        'viewOptions'=>['role'=>'modal-remote','title'=>'View','data-toggle'=>'tooltip'],
        'updateOptions'=>['role'=>'modal-remote','title'=>'Update', 'data-toggle'=>'tooltip'],
        'deleteOptions'=>['role'=>'modal-remote','title'=>'Delete', 
                          'data-confirm'=>false, 'data-method'=>false,// for overide yii data api
                          'data-request-method'=>'post',
                          'data-toggle'=>'tooltip',
                          'data-confirm-title'=>'Are you sure?',
                          'data-confirm-message'=>'Are you sure want to delete this item'], 
    ],

];   