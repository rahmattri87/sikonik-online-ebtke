<?php
use yii\helpers\Url;
use kartik\grid\GridView;

return [
        
    [
        'class' => 'kartik\grid\CheckboxColumn',
        'width' => '20px',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'id_rkkal',
        'width' => '20px',
        'attribute'=>'id_rkkal',
        'pageSummary'=>'Total :',
        'pageSummaryOptions'=>['class'=>'text-right text-warning'],
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'kd_apbn',            
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'kd_subdir',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'thn_anggaran',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'uraian_kegiatan',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'anggaran',
        'format'=>['decimal',2],
        'vAlign'=>'middle',    
        'hAlign'=>'right',        
        'pageSummary'=>true,
        'pageSummaryFunc'=>GridView::F_SUM  
        
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'revisi',
    ],
   

];   